<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDifficultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('difficulties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('difficulty_date');
            $table->longText('difficulty');
            $table->longText('next_difficulty')->nullable();
            $table->longText('next_difficulty_date')->nullable();
            $table->tinyInteger('is_current_difficulty')->default(0);

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
        Schema::dropIfExists('difficulties');
    }
}

//id
//difficulty_date
//difficulty
//next_difficulty
//is_current_difficulty
//created_at
//updated_at
//deleted_at