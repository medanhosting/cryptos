<?php

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $currency = Currency::firstOrCreate(['name' => 'Bitcoin', 'slug' => str_slug('Bitcoin'), 'code' => 'BTC']);
        if(!$currency) {
            $currency->name = 'Bitcoin';
            $currency->slug = str_slug('Bitcoin');
            $currency->code = 'BTC';

            $currency->save();
        }

    }
}
