<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
            ['name' => 'super admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
			['name' => 'admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['name' => 'staff', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
    	];
        DB::table('roles')->insert($roles);
    }
}
