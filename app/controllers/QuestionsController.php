<?php

class QuestionsController extends AdminBaseController
{

    protected $modelClassName = 'question';

    public function beforeAdminCreateOrEdit($view)
    {
        $titles = array_column(Title::all()->toArray(), 'name', 'id');
        $typeQuestions = array_column(TypeQuestion::all()->toArray(), 'name', 'id');
        $view->with('titles', $titles)
             ->with('typeQuestions', $typeQuestions);
    }

    public function storeAjax()
    {
        $question = new Question(Input::all());
        if (!$question->validate()) {
            throw new Exception(implode(' ', $question->errors()->toArray()));
        }

        /** @TODO: validar se o checklist é do usuário logado */
        $questions = Title::findOrFail(Input::get('title_id'))
            ->checklist
            ->questions()
            ->orderBy('questions.updated_at', 'desc')
            ->groupBy('questions.id')
            ->limit(1)
            ->get();

        $alternatives = null;
        $typeQuestionId = null;
        if (count($questions)) {
            $lastQuestion = $questions[0];
            $alternatives = $lastQuestion->alternatives;
            $alternatives = json_decode(json_encode($alternatives, true), true);
            $typeQuestionId = $lastQuestion->typeQuestion_id;
        }
        if (!$alternatives) {
            $alternatives = Alternative::query()
                ->limit(1)
                ->get(['name', 'id'])
                ->toArray();
            $typeQuestionId = TypeQuestion::query()
                ->limit(1)
                ->get(['id'])[0]->id;
        }

        $question->typeQuestion_id = $typeQuestionId;
        if (!$question->save()) {
            throw new Exception(Lang::get('Não foi possível salvar a questão.'));
        }

        $alternativeIds = array_column($alternatives, 'id');
        $question->alternatives()->attach($alternativeIds);

        $question->alternatives = $alternatives;
        return $question;
    }

    public function updateAjax($id)
    {
        /** @TODO: validar se o checklist é do usuário logado */
        $question = Question::find($id);
        $question->fill(Input::all());
        if ($question->updateUniques()) {
            return $question;
        }
    }

    public function destroyAjax($id)
    {
        /** @TODO: validar se o checklist é do usuário logado */
        $question = Question::findOrFail($id);
        $question->alternatives()->detach();
        $question->delete();
    }

}
