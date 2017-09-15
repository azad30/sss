<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgainAddColumnToRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function($table)
        {
            $table->integer('assign_given_by_id')->after('assign_by_id')->unsigned()->nullable();
            $table->foreign('assign_given_by_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests', function(Blueprint $table) {
            $table->dropForeign('requests_assign_given_by_id_foreign');
            $table->dropColumn('assign_given_by_id');
        });
    }
}
