<?php

class EvaluationsController extends AdminBaseController
{

    protected $modelClassName = 'evaluation';

    public function beforeAdminCreateOrEdit($view)
    {
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $checklists = array_column(Checklist::all()->toArray(), 'name', 'id');
        $view->with('users', $users)
             ->with('checklists', $checklists);
    }

}
