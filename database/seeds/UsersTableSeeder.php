<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'super.admin@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        if (env('APP_ENV') == 'local') {
            $users = collect($users)->merge([
                [
                    'email' => 'staff@gmail.com',
                    'password' => bcrypt('123456'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ])->all();
        }

        DB::table('users')->insert($users);
    }
}
