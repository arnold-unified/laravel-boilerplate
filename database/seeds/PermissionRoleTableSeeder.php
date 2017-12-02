<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Permission;
use App\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Super Admin permissions
        $super_admin_permissions = Permission::forSuperAdmin();
        $super_admin_role = Role::find(1);
        $super_admin_perm = Permission::whereIn('name', $super_admin_permissions)->get();
        $super_admin_role->permissions()->attach($super_admin_perm, [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Admin permissions
        $admin_permissions = Permission::forAdmin();
        $admin_role = Role::find(2);
        $admin_perm = Permission::whereIn('name', $admin_permissions)->get();
        $admin_role->permissions()->attach($admin_perm, [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Staff permissions
        $staff_permissions = Permission::forStaff();
        $staff_role = Role::find(3);
        $staff_perm = Permission::whereIn('name', $staff_permissions)->get();
        $staff_role->permissions()->attach($staff_perm, [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
