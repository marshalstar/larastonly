<?php

use Faker\Factory as Faker;

class CountriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Country::create([

			]);
		}
	}

}
