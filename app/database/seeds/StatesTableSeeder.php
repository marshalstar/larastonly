<?php

use Faker\Factory as Faker;

class StatesTableSeeder extends Seeder {

	public function run()
	{
	    $faker = Faker::create();
        $countries = Country::all();

        DB::table('states')->insert(array_map(function() use ($faker, $countries) {
            return [
                'name' => $faker->sentence(rand(1, 4)),
                'country_id' => $countries->get(rand(0, $countries->count() -1))->id,
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}
