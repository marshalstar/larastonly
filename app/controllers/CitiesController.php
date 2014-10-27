<?php

class CitiesController extends AdminBaseController
{

    protected $modelClassName = 'city';

    protected function beforeAdminCreateOrEdit($view)
    {
        $states = array_column(State::all(['id', 'name'])->toArray(), 'name', 'id');
        $view->with('states', $states);
    }

}
