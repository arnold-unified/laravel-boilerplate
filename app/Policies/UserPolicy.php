<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can get all users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function all(User $user)
    {
        return $user->hasPermission('view-all-users');
    }

    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user, User $u)
    {
        return $user->hasPermission('view-user');
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-user');
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user, User $u)
    {
        return $user->hasPermission('update-user');
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user, User $u)
    {
        return $user->hasPermission('delete-user');
    }

    public function assignRole(User $user, User $u)
    {
        return $user->hasPermission('assign-user-roles');
    }
}
