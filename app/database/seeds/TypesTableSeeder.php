<?php

use Faker\Factory as Faker;

class TypesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
            $type = new Type;
            $type->name = $faker->unique()->sentence(rand(1, 4));
            $type->forceSave();
		}
	}

}