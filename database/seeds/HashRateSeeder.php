<?php

use Illuminate\Database\Seeder;
use \App\Models\HashRate;

class HashRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $rates = ['TH/s', 'GH/s', 'MH/s', 'kH/s'];

        for($i = 0; $i < count($rates); $i++) {
            $rate = new HashRate;
            $rate->name = $rates[$i];
            $rate->slug = str_slug($rates[$i]);

            $rate->save();
        }

    }
}
