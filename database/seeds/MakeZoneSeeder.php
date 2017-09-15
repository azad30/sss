<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MakeZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zones')->insert([
            'id' => 1,
            'name' => 'Uttara',
            'region_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
