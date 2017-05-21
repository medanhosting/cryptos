<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id')->unsigned();
            $table->integer('hashrate_id')->unsigned();
            $table->double('quantity');
            $table->string('date_invested')->nullable();
            $table->integer('month_invested')->nullable();
            $table->integer('year_invested')->nullable();
            $table->integer('reinvest_id')->nullable();
            $table->integer('expected_difficulty_id')->nullable();
            $table->integer('actual_difficulty_id')->nullable();

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
        Schema::dropIfExists('rows');
    }
}

//id
//plan_id
//hashrate_id
//quantity
//date_invested
//month_invested
//year_invested
//reinvest_id
//expected_difficulty_id
//actual_difficulty_id
//created_at
//updated_at
//deleted_at