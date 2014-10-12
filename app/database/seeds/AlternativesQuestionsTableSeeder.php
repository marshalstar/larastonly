<?php

use Faker\Factory as Faker;

class AlternativesQuestionsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $alternatives = Alternative::all();
        $questions = Question::all();

        $alterternativeQuestions = [];
        foreach($questions as $question) {
            foreach($alternatives as $alternative) {
                foreach(range(0, Evaluation::all()->count()) as $i) {
                    if (mt_rand(0, 1)) {
                        $alterternativeQuestions[] = [
                            'alternative_id' => $alternative->id,
                            'question_id' => $question->id,
                        ];
                    }
                }
            }
        }

        DB::table('alternative_question')->insert($alterternativeQuestions);
    }
}