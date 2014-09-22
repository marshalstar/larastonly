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
                    'alternative_id' => Alternative::all()->get($index%30)->id,
                    'question_id' => Question::all()->get(intval($index/30))->id,
                ];
            }
        }, range(0, 899))));
    }
}