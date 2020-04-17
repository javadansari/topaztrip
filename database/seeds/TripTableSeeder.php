<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i <= 100; $i++):
            DB::table('trips')
                ->
                insert([
                    'name' => $faker->name(),
                    'description' => $faker->sentence(20),
                    'slug' => $faker->numberBetween(20, 1000),
                    'userID' => $faker->numberBetween(1, 10),
                    'view' => $faker->numberBetween(1, 10),
                    'picture' => $faker->address,
                    'group' => $faker->numberBetween(1, 10),
                ]);;
        endfor;
    }
}
