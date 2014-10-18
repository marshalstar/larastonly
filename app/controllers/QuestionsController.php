<?php

class QuestionsController extends BaseController
{

    protected $modelClassName = 'question';

    public function beforeCreateOrEdit($view)
    {
        $titles = array_column(Title::all()->toArray(), 'name', 'id');
        $view->with('titles', $titles);
    }

    public function destroyCascadeAjax($id)
    {
        $question = Question::findOrFail($id);
        $question->alternatives()->delete();
        $question->delete();
    }

}
