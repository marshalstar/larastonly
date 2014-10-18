<?php

class CitiesController extends BaseController
{

    protected $modelClassName = 'city';

    protected function beforeCreateOrEdit($view)
    {
        $states = array_column(State::all(['id', 'name'])->toArray(), 'name', 'id');
        $view->with('states', $states);
    }

}
