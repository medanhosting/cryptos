<?php

use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $difficulty = new \App\Models\Difficulty;
        $difficulty->difficulty_date = time();
        $difficulty->difficulty = '5.59970892891e+11';
        $difficulty->next_difficulty = '6.39216233996e+11';
        $difficulty->is_current_difficulty = 1;

        $difficulty->save();

    }
}
