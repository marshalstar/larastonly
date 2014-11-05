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
                'weight' => $faker->randomDigit,
                'created_at' => $faker->dateTimeThisYear,
                'updated_at' => $faker->dateTimeThisMonth,
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}