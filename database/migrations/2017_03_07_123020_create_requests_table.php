<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_name', 100);
            $table->string('contact_number', 100)->nullable();
            $table->string('problem_type', 20)->nullable();
            $table->string('module_type', 20)->nullable();

            $table->string('problem_name', 100)->nullable();
            $table->string('problem_member_name', 100)->nullable();
            $table->string('problem_member_id', 100)->nullable();
            $table->string('problem_samity_code', 100)->nullable();
            $table->timestamp('problem_date')->nullable();
            $table->decimal('problem_amount', 12, 2)->nullable();
            $table->string('problem_details', 750)->nullable();
//            $table->string('voucher_type', 100)->nullable();
            $table->string('voucher_code', 100)->nullable();
//            $table->timestamp('voucher_date')->nullable();

            $table->string('right_member_name', 100)->nullable();
            $table->string('right_member_id', 100)->nullable();
            $table->string('right_samity_code', 100)->nullable();
            $table->decimal('right_amount',  12, 2)->nullable();
            $table->string('right_details', 750)->nullable();

            $table->integer('status_id')->unsigned()->nullable();
            $table->integer('seen_by_id')->unsigned()->nullable();
            $table->integer('assign_by_id')->unsigned()->nullable();
            $table->integer('accomplished_by_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();

            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('seen_by_id')->references('id')->on('users');
            $table->foreign('assign_by_id')->references('id')->on('users');
            $table->foreign('accomplished_by_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
