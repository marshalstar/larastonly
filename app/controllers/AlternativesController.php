<?php

class AlternativesController extends AdminBaseController
{

    protected $modelClassName = 'alternative';

    public function beforeAdminCreateOrEdit($view)
    {
        $typeAlternatives = array_column(TypeAlternative::all()->toArray(), 'name', 'id');
        $view->with('typeAlternatives', $typeAlternatives);
    }

    public function storeAjax()
    {
        $alternative = new Alternative(Input::except('question_id'));
        if ($alternative->save()) {
            if ($question_id = Input::get('question_id')) {
                $alternative->questions()->attach($question_id);
            }
            return $alternative;
        }
    }

    public function updateAjax($id)
    {
        $alternative = Alternative::findOrFail($id);
        $alternative->fill(Input::except('question_id'));
        if ($alternative->updateUniques()) {
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
    }

}
