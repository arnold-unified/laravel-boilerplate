<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Profile;

class UsersController extends Controller
{
    public function index(Request $request)
    {
    	$users = User::with([
            'profile', 
            'roles'
        ])->get();

    	return response()->json($users);
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);

    	$this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

    	$user = new User();
    	$user->email = $request->email;
    	$user->password = $request->password;
    	$user->save();

    	$profile = new Profile();
    	$profile->user_id = $user->id;
    	$profile->first_name = $request->first_name;
    	$profile->middle_name = $request->middle_name;
    	$profile->last_name = $request->last_name;
    	$profile->save();

    	$user->load('profile');

    	return response()->json($user);
    }

    public function show(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('view', $user);

        $user->load('profile');

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255'
        ]);

        $user->profile->first_name = $request->first_name;
        $user->profile->middle_name = $request->middle_name;
        $user->profile->last_name = $request->last_name;
        $user->profile->save();

        $user->load('profile');

        return response()->json($user);
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('delete', $user);

        // Append '__deleted' string to user's email
        function getDeletedEmail($email)
        {
            $exploded = explode('@', $email);
            $username = $exploded[0] . '__deleted';

            return $username . '@' . $exploded[1];
        }
        $user->email = getDeletedEmail($user->email);
        $user->save();

        $user->delete();

        return response()->json([
            'success' => true,
            'type' => 'success',
            'message' => "User successfully deleted."
        ]);
    }

    public function assignRoles(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('assignRole', $user);

        $rules = ['role_ids.0' => 'required|numeric'];
        $messages = [
            'role_ids.0.required' => 'Role ID is required.',
            'role_ids.0.numeric' => 'Role ID must be a number.'
        ];
        if ($request->has('role_ids')) {
            foreach ($request->role_ids as $key => $value) {
                $rules['role_ids.'.$key] = 'required|numeric';
                $messages['role_ids.'.$key.'.required'] = 'Role ID is required.';
                $messages['role_ids.'.$key.'.numeric'] = 'Role ID must be a number.';
            }
        }
        $this->validate($request, $rules, $messages);

        $roles = Role::whereIn('id', $request->role_ids)->get()->pluck('id')->all();
        $user->roles()->sync($roles);

        return response()->json([
            'success' => true,
            'type' => 'success',
            'message' => 'Successfully assigned roles to user.',
            'user' => $user->load('roles')
        ]);
    }
}
