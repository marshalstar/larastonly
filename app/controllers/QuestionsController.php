<?php

class QuestionsController extends BaseController
{

    protected $baseSingular = 'question';
    protected $basePlural = 'questions';
    protected $likeAttributes = ['id'];

    protected function newObj()
    {
        return new Question();
    }

    protected function query()
    {
        return Question::query();
    }

    public function beforeCreate($view)
    {
        $titles = array_column(Title::all()->toArray(), 'name', 'id');
        $view->with('titles', $titles);
    }

    public function beforeEdit($view, $obj)
    {
        $titles = array_column(Title::all()->toArray(), 'name', 'id');
        $view->with('titles', $titles);
    }

    public function beforeUpdate($obj, $id)
    {
        $obj->is_about_assessable = Input::get('is_about_assessable') == 'on';
    }

}
