<?php

use Illuminate\Database\Seeder;
use \App\Models\ReinvestPeriod;

class ReinvestPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $periods = ['Daily', 'Monthly', 'Annually'];

        for($i = 0; $i < count($periods); $i++) {
            $period = new ReinvestPeriod;
            $period->name = $periods[$i];
            $period->slug = str_slug($periods[$i]);

            $period->save();
        }

    }
}
