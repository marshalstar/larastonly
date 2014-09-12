<?php

use Faker\Factory as Faker;

class AlternativesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
            $alternative = new Alternative;
            $alternative->name = $faker->sentence();
            $alternative->type_id = Type::all()->get(rand(0, Type::count() -1))->id;
            $alternative->forceSave();
		}
	}

}
