<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CurrencySeeder::class);
         $this->call(DifficultySeeder::class);
         $this->call(HashRateSeeder::class);
         $this->call(ReinvestPeriodSeeder::class);
         $this->call(TermSeeder::class);
    }
}
