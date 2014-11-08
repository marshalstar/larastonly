<?php

class AlternativesController extends AdminBaseController
{

    protected $modelClassName = 'alternative';

    public function storeAjax()
    {
        $name = Input::get('name');
        $question = $this->getQuestionOrFail();
        $alternative = Alternative::whereName($name)->first();
        if (!$alternative) {
            $alternative = new Alternative(['name' => $name]);
            if (!$alternative->save()) {
                throw new Exception(Lang::get('não foi possível criar alternativa'));
            }
        }

        $alternative->questions()->attach($question->id);
        $question->touch();
        return $alternative;
    }

    public function updateAjax()
    {
        $id = Input::get('id');
        $question = $this->getQuestionOrFail();
        $alternative = Alternative::findOrFail($id);
        $question->alternatives()->detach($alternative->id);
        return $this->storeAjax();
    }

    public function destroyAjax($id)
    {
        $question = $this->getQuestionOrFail();
        $alternative = Alternative::findOrFail($id);
        $question->alternatives()->detach($alternative->id);
        $question->touch();
    }

    /**
     * @return Question
     * @throws Exception
     */
    private function getQuestionOrFail()
    {
        $questionId = Input::get('question_id');
        if (!$questionId) {
            throw new Exception(Lang::get('questão inválida'));
        }
        $question = Question::findOrFail($questionId);
        $question->authOrFail();
        return $question;
    }

}
