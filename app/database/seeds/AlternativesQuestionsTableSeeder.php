<?php

use Faker\Factory as Faker;

class AlternativesQuestionsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::table('alternative_question')->insert(array_filter(array_map(function($index) use ($faker) {
            if (!rand(0, 2)) {
                return [
                    'alternative_id' => Alternative::all()->get($index%DatabaseSeeder::$dimension)->id,
                    'question_id' => Question::all()->get(intval($index/DatabaseSeeder::$dimension))->id,
                ];
            }
        }, range(0, DatabaseSeeder::$dimension*DatabaseSeeder::$dimension -1))));
    }
}