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
                                    ->groupBy('evaluations.id')
                                    ->distinct('alternative_question.id')
                                    ->get();

        DB::table('answers')->insert(array_filter(array_map(function($index) use ($faker, $evaluations, $alternativesQuestions) {

            if (rand(0, 1)) {
                return null;
            }

            $evaluation = $evaluations->get($index%$evaluations->count());
            $alternativeQuestion = $alternativesQuestions[intval($index/$evaluations->count())];

            return [
                'evaluation_id' => $evaluation->id,
                'alternative_question_id' => $alternativeQuestion->id,
            ];
        }, range(0, $evaluations->count() *count($alternativesQuestions) -1))));
    }

} 