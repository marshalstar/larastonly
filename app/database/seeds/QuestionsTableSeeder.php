<?php

use Faker\Factory as Faker;

class QuestionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
            $question = new Question;
            $question->title_id = Type::all()->get(rand(0, Type::count() -1))->id;
            $question->statement = $faker->unique()->paragraph();
            $question->is_about_assessable = $faker->randomDigit <= 1;
            $question->weight = $faker->randomDigit;
            $question->forceSave();
		}

	}

}