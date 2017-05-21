<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('currency_id')->unsigned()->default(1);
            $table->integer('starting_row_id')->unsigned()->nullable();
            $table->string('plan_date');
            $table->tinyInteger('reinvest')->default(1);
            $table->integer('reinvest_period_id')->unsigned()->default(1);
            $table->integer('term_id')->unsigned()->default(1);
            $table->integer('stop_reinvesting_term_id')->unsigned()->default(1);

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
        Schema::dropIfExists('plans');
    }
}

//id
//user_id
//currency_id
//plan_date
//starting_row
//reinvest
//reinvest_period_id
//term_id
//stop_reinvesting_term_id
//created_at
//updated_at
//deleted_at