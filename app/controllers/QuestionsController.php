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
        if ($question->save()) {
            return $question;
        }
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
