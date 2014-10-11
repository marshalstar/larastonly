<?php

class QuestionsController extends BaseController
{

    protected $modelClassName = 'question';
    protected $likeAttributes = ['id', 'title_id', 'statement', 'weight', 'created_at', 'updated_at'];

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
