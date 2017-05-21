<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id')->unsigned();
            $table->integer('row_id')->unsigned();
            $table->integer('row_would_be_id')->unsigned()->nullable();
            $table->integer('withdrawal_id')->unsigned()->nullable();
            $table->string('balance');
            $table->string('balance_date');
            $table->string('balance_hash_rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balances');
    }
}

//id
//plan_id
//row_id
//row_would_be_id (after withdrawal)
//balance
//balance_date
//balance_hash_rate
//withdrawal_id
//created_at
//updated_at
//deleted_at