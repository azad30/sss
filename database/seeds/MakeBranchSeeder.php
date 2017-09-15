<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MakeBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            'id' => 1,
            'name' => 'Sonargaon Janapoth',
            'zone_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
