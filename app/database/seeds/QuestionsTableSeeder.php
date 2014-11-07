<?php

use Faker\Factory as Faker;

class QuestionsTableSeeder extends Seeder
{

	public function run()
	{
        $faker = Faker::create('pt_BR');
        $titles = Title::all();
        $count = Question::count();
        $typeQuestions = TypeQuestion::all();

        DB::table('questions')->insert(array_map(function() use ($faker, $titles, $count, $typeQuestions) {
            return [
                'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                'statement' => $faker->unique()->paragraph(). ' ' .$count,
                'weight' => $faker->randomDigit,
                'created_at' => $faker->dateTimeThisYear,
                'updated_at' => $faker->dateTimeThisMonth,
                'typeQuestion_id' => $typeQuestions->get(rand(0, $typeQuestions->count() -1))->id,
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}