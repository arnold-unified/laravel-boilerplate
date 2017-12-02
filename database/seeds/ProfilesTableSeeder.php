<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$profiles = [
            [
                'user_id' => 1,
                'first_name' => 'crissy',
                'last_name' => 'doe',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'first_name' => 'mae',
                'last_name' => 'stewart',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        if (env('APP_ENV') == 'local') {
            $profiles = collect($profiles)->merge([
                [
                    'user_id' => 3,
                    'first_name' => 'jane',
                    'last_name' => 'smith',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ])->all();
        }

        DB::table('profiles')->insert($profiles);
    }
}
