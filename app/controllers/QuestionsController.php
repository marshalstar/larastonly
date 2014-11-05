<?php

class QuestionsController extends AdminBaseController
{

    protected $modelClassName = 'question';

    public function beforeAdminCreateOrEdit($view)
    {
        $titles = array_column(Title::all()->toArray(), 'name', 'id');
        $view->with('titles', $titles);
    }

    public function storeAjax()
    {
        //$question = new Question(Input::all());
        $question = Question::first();
        /*if ($question->save()) {
            return $question;
        }/**/
        return DB::table('alternatives')
            ->join('alternative_question', 'alternative_question.alternative_id', '=', 'alternatives.id')
            ->whereIn('alternative_question.question_id', function($q) use ($question) {
                $q->from('questions')
                    ->join('titles', 'questions.title_id', '=', 'titles.id')
                    ->join('checklists', 'titles.checklist_id', '=', 'checklists.id')
                    ->whereIn('checklists.id', function($q) use ($question) {
                        $q->select('checklists.id')
                            ->from('checklists')
                            ->join('titles', 'titles.checklist_id', '=', 'checklists.id')
                            ->join('questions', 'questions.title_id', '=', 'titles.id')
                            ->where('questions.id', '=', $question->id);
                    })
                    ->orderBy('updated_at', 'desc')
                    ->limit(1)
                    ->get(['questions.*']);
            });


            DB::table('questions')
            ->join('titles', 'questions.title_id', '=', 'titles.id')
            ->join('checklists', 'titles.checklist_id', '=', 'checklists.id')
            ->whereIn('checklists.id', function($q) use ($question) {
                $q->select('checklists.id')
                    ->from('checklists')
                    ->join('titles', 'titles.checklist_id', '=', 'checklists.id')
                    ->join('questions', 'questions.title_id', '=', 'titles.id')
                    ->where('questions.id', '=', $question->id);
            })
            ->orderBy('updated_at', 'desc')
            ->limit(1)
            ->get(['questions.*']);
//        return DB::table('questions')
//            ->join('titles', 'questions.title_id', '=', 'titles.id')
//            ->join('checklists', 'titles.checklist_id', '=', 'checklists.id')
//            ->whereIn('checklists.id', function($q) use ($question) {
//                $q->select('checklists.id')
//                  ->from('checklists')
//                  ->join('titles', 'titles.checklist_id', '=', 'checklists.id')
//                  ->join('questions', 'questions.title_id', '=', 'titles.id')
//                  ->where('questions.id', '=', $question->id);
//            })
//            ->orderBy('updated_at', 'desc')
//            ->limit(1)
//            ->get(['questions.*']);
        $checklistId = $question->title->checklist->id;
        $ns = Checklist::find($checklistId)
            ->titles
            ->questions;
//            ->orderBy('updated_at', 'desc')
//            ->first();
        return $ns;
        $lastQuestionChanged = Question::orderBy('updated_at', 'desc')->first();
        $question->alternatives = $lastQuestionChanged->alternatives->toArray();
        return $question;
    }

    public function updateAjax($id)
    {
        $question = Question::find($id);
        $question->fill(Input::all());
        if ($question->updateUniques()) {
            return $question;
        }
    }

    public function destroyAjax($id)
    {
        $question = Question::findOrFail($id);
        $question->alternatives()->delete();
        $question->delete();
    }

}
