<?php

class StatesController extends BaseController
{

    protected $baseSingular = 'state';
    protected $basePlural = 'states';
    protected $likeAttributes = ['id', 'name', 'country_id'];

    protected function newObj($attributes = array())
    {
        return new State($attributes);
    }

    protected function query()
    {
        return State::query();
    }

    protected function beforeCreateOrEdit($view)
    {
        $countries = array_column(Country::all()->toArray(), 'name', 'id');
        $view->with('countries', $countries);
    }

}
