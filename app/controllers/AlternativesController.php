<?php

class AlternativesController extends AdminBaseController
{

    protected $modelClassName = 'alternative';

    public function storeAjax()
    {
        /** @TODO: validar se o checklist é do usuário logado */
        $alternative = new Alternative(Input::except('question_id'));
        if ($alternative->save()) {
            if ($questionId = Input::get('question_id')) {
                $question = Question::findOrFail($questionId);
                $alternative->questions()->attach($questionId);
                $this->updateQuestion($question);
            }
            return $alternative;
        }
    }

    public function updateAjax($id)
    {
        /** @TODO: validar se o checklist é do usuário logado */
        $alternative = Alternative::findOrFail($id);
        $alternative->fill(Input::except('question_id'));
        if ($alternative->updateUniques()) {
            $this->updateQuestion($alternative->question);
            return $alternative;
        }
    }

    public function destroyAjax($id)
    {
        if (!Input::get('question_id')) {
            throw new Exception('not found question');
        }
        $question = Question::findOrFail(Input::get('question_id'));
        $alternative = Alternative::findOrFail($id);
        $question->alternatives()->detach($alternative->id);
        $this->updateQuestion($question);
    }

    /**
     * @param $question \Illuminate\Database\Eloquent\Model
     */
    private function updateQuestion($question)
    {
        $question->updated_at = \Carbon\Carbon::now();
        $question->save();
    }

}
