<?php

use Illuminate\Database\Seeder;

class AssignBranchToAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->where('id', 1)
            ->update(['branch_id' => 1]);
    }
}
