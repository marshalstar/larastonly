<?php

use Faker\Factory as Faker;

class AnswersTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        $evaluations = Evaluation::all();
        $alternativesQuestions = DB::table('alternative_question')
                                    ->select('alternative_question.id')
                                    ->join('questions', 'alternative_question.question_id', '=', 'questions.id')
                                    ->join('titles', 'questions.title_id', '=', 'titles.id')
                                    ->join('checklists', 'titles.checklist_id', '=', 'checklists.id')
                                    ->join('evaluations', 'evaluations.checklist_id', '=', 'checklists.id')
                                    ->join('alternatives', 'alternatives.id', '=', 'alternative_question.alternative_id')
                                    ->distinct('alternative_question.id')
                                    ->get();
        $answers = [];
        foreach($alternativesQuestions as $alternativeQuestion) {
            $answers[] = [
                'evaluation_id' => $evaluations->random()->id,
                'alternative_question_id' => $alternativeQuestion->id,
            ];
        }

        DB::table('answers')->insert($answers);
    }

} 