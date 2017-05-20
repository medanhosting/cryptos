<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReinvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reinvests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->integer('currency_id')->unsigned();
            $table->string('reinvest_date');

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
        Schema::dropIfExists('reinvests');
    }
}

//id
//value
//currency_id
//reinvest_date
//created_at
//updated_at
//deleted_at