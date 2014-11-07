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
        $question = new Question(Input::except(['alternatives-default']));
        if (!$question->validate()) {
            throw new Exception(implode(' ', $question->errors()->toArray()));
        }

        $checklist = Title::findOrFail(Input::get('title_id'))->checklist;
        $checklist->authOrFail();

        $alternatives = null;
        $typeQuestion = null;
        if ($alternativesDefault = Input::get('alternatives-default')) {
            /**** funcionalidade da professora (⌐■_■) ****/
            $alternatives = [];
            foreach($alternativesDefault as $alternativeName) {
                $alternative = Alternative::firstOrCreate(['name' => $alternativeName]);
                $alternatives[] = [
                    'id' => $alternative->id,
                    'name' => $alternative->name,
                ];
            }
            $typeQuestion = TypeQuestion::first();
            /****  ****/

        } else {
            $lastQuestion = $checklist->lastQuestionUpdated();
            if ($lastQuestion) {
                $alternatives = $lastQuestion->alternatives;
                $alternatives = json_decode(json_encode($alternatives, true), true);
                $typeQuestion = TypeQuestion::findOrFail($lastQuestion->typeQuestion_id);
            }
        }

        if (!$alternatives) {
            $alternatives = Alternative::query()
                            ->limit(1)
                            ->get(['name', 'id'])
                            ->toArray();
            $typeQuestion = TypeQuestion::first();
        }

        $question->typeQuestion_id = $typeQuestion->id;
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
        $question = Question::findOrFail($id);
        $question->authOrFail();
        $question->fill(Input::all());
        if ($question->updateUniques()) {
            return $question;
        }
    }

    public function destroyAjax($id)
    {
        $question = Question::findOrFail($id);
        $question->authOrFail();
        $question->alternatives()->detach();
        $question->delete();
    }

}
