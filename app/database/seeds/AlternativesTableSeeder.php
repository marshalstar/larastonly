<?php

use Faker\Factory as Faker;

class AlternativesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
			Alternative::create([
                'name' => $faker->sentence(),
                'type_id' => Type::all()->get(rand(0, Type::count() -1))->id,
			]);
		}
	}

}
