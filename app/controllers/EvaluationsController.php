<?php

class EvaluationsController extends BaseController
{

    protected $modelClassName = 'evaluation';
    protected $likeAttributes = ['id', 'user_id', 'checklist_id', 'commentary', 'created_at', 'updated_at'];

    public function beforeCreateOrEdit($view)
    {
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $checklists = array_column(Checklist::all()->toArray(), 'name', 'id');
        $view->with('users', $users)
             ->with('checklists', $checklists);
    }

}
