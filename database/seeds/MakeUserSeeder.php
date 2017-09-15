<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MakeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => bcrypt('123456'),
            'remember_token' => bcrypt(str_random(10)),
            'role' => user,
            'branch_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
