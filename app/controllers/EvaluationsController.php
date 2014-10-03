<?php

class EvaluationsController extends BaseController
{

    protected $baseSingular = 'evaluation';
    protected $basePlural = 'evaluations';
    protected $likeAttributes = ['id', 'user_id', 'checklist_id', 'commentary', 'created_at', 'updated_at'];

    protected function newObj()
    {
        return new Evaluation();
    }

    protected function query()
    {
        return Evaluation::query();
    }

    public function beforeCreate($view)
    {
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $checklists = array_column(Checklist::all()->toArray(), 'name', 'id');
        $view->with('users', $users)
             ->with('checklists', $checklists);
    }

    public function beforeEdit($view, $obj)
    {
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $checklists = array_column(Checklist::all()->toArray(), 'name', 'id');
        $view ->with('users', $users)
              ->with('checklists', $checklists);
    }

}
