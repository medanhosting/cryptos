<?php

use Illuminate\Database\Seeder;
use \App\Models\Term;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $durations = [10, 9, 8, 7, 6, 5, 4, 3, 2, 1];

        for($i = 0; $i < count($durations); $i++) {
            $term = new Term;
            $term->name = $durations[$i] . " Years";
            $term->slug = str_slug($durations[$i] . " Years");
            $term->year_quantity = $durations[$i];

            $term->save();
        }

    }
}
