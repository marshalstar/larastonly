<?php

use Faker\Factory as Faker;

class QuestionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
			Question::create([
                'title_id' => Type::all()->get(rand(0, Type::count() -1))->id,
                'statement' => $faker->paragraph(),
                'is_about_assessable' => $faker->randomDigit <= 1,
			]);
		}
	}

}