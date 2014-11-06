<?php

use Faker\Factory as Faker;

class CountriesTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create('pt_BR');
        $count = Country::count();
        $increment = ($count > 30)? $count : '';

        DB::table('countries')->insert(array_map(function() use ($faker, $increment) {
            return [
                'name' => $faker->unique()->country. ' ' .$increment,
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}
