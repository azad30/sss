<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MakeAdminSeeder::class);
        $this->call(MakeRegionSeeder::class);
        $this->call(MakeZoneSeeder::class);
        $this->call(MakeBranchSeeder::class);
        $this->call(MakeUserSeeder::class);
        $this->call(AssignBranchToAdmin::class);
        $this->call(MakeStatusSeeder::class);
    }
}
