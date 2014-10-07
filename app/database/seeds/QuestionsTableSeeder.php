<?php

use Faker\Factory as Faker;

class QuestionsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();
        $titles = Title::all();
        $count = Question::count();
        $increment = ($count > 30)? $count : '';

        DB::table('questions')->insert(array_map(function() use ($faker, $titles, $increment) {
            return [
                'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                'statement' => $faker->unique()->paragraph(). ' ' .$increment,
                'is_about_assessable' => $faker->randomDigit <= 1,
                'weight' => $faker->randomDigit,
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}