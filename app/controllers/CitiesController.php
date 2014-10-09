<?php

class CitiesController extends BaseController
{

    protected $modelClassName = 'city';
    protected $likeAttributes = ['id', 'state_id'];

    protected function beforeCreateOrEdit($view)
    {
        $states = array_column(State::all(['id', 'name'])->toArray(), 'name', 'id');
        $view->with('states', $states);
    }

}
