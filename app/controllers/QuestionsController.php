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
        $question = new Question(Input::all());
        if (!$question->save()) {
            /** @TODO: dar exception e mostrar mensagem mensagem de erro */
            return App::abort(404);
        }

        $alternatives = $this->alternativesOfLastChangedQuestionByChecklist($question->id);

        if (count($alternatives)) {
            $alternatives = json_decode(json_encode($alternatives, true), true);
        } else {
            $alternatives = Alternative::query()
                ->limit(1)
                ->get(['name', 'id'])
                ->toArray();
        }

        $alternativeIds = array_column($alternatives, 'id');
        $question->alternatives()->attach($alternativeIds);

        $question->alternatives = $alternatives;
        return $question;
    }

    /**
     * @param $questionId
     * @return array
     */
    private function alternativesOfLastChangedQuestionByChecklist($questionId)
    {
        return DB::table('alternatives')
            ->join('alternative_question', 'alternative_question.alternative_id', '=', 'alternatives.id')
            ->join('questions', 'alternative_question.question_id', '=', 'questions.id')
            ->join('titles', 'questions.title_id', '=', 'titles.id')
            ->join('checklists', 'titles.checklist_id', '=', 'checklists.id')
            ->whereIn('checklists.id', function($query) use ($questionId) {
                $query->from('questions')
                    ->join('titles', 'questions.title_id', '=', 'titles.id')
                    ->join('checklists', 'titles.checklist_id', '=', 'checklists.id')
                    ->where('questions.id', '=', $questionId)
                    ->get(['checklists.id']);
            })
            ->groupBy('alternatives.id')
            ->get(['alternatives.name', 'alternatives.id']);
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
        $question->alternatives()->detach();
        $question->delete();
    }

}
