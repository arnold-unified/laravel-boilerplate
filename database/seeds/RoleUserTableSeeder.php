<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\Role;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminUser = User::find(1);
        $superAdminRole = Role::find(1);
        $superAdminUser->roles()->attach($superAdminRole, [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $adminUser = User::find(2);
        $adminRole = Role::find(2);
        $adminUser->roles()->attach($adminRole, [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if (env('APP_ENV') == 'local') {
            $staffUser = User::find(3);
            $staffRole = Role::find(3);
            $staffUser->roles()->attach($staffRole, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
