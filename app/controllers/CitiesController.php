<?php

class CitiesController extends BaseController
{

    protected $baseSingular = 'city';
    protected $basePlural = 'cities';
    protected $likeAttributes = ['id', 'state_id'];

    protected function newObj($attributes = array())
    {
        return new City($attributes);
    }

    protected function query()
    {
        return City::query();
    }

    protected function beforeCreateOrEdit($view)
    {
        $states = array_column(State::all(['id', 'name'])->toArray(), 'name', 'id');
        $view->with('states', $states);
    }

}
