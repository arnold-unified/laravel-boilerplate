<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Role;

class Permission extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public static function getAll()
    {
        return [
            // User
            ['name' => 'view-all-users'], 
            ['name' => 'view-user'], 
            ['name' => 'create-user'], 
            ['name' => 'update-user'], 
            ['name' => 'delete-user'], 
            ['name' => 'assign-user-roles'],
        ];
    }

    public static function forSuperAdmin()
    {
        return [
            // User
            'view-all-users', 'view-user', 'create-user', 'update-user', 'delete-user', 'assign-user-roles',
        ];
    }
    
    public static function forAdmin()
    {
        return [
            // User
            'view-all-users', 'view-user', 'create-user', 'update-user', 'delete-user', 'assign-user-roles',
        ];
    }

    public static function forStaff()
    {
        return [
            // User
            'view-all-users', 'view-user',
        ];
    }
}
