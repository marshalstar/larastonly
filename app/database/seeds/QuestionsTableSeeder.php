<?php

use Faker\Factory as Faker;

class QuestionsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

        DB::table('questions')->insert(array_map(function() use ($faker) {
            return [
                'title_id' => Type::all()->get(rand(0, Type::count() -1))->id,
                'statement' => $faker->unique()->paragraph(),
                'is_about_assessable' => $faker->randomDigit <= 1,
                'weight' => $faker->randomDigit,
            ];
        }, range(1, 30)));
	}

}