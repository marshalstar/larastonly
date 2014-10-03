<?php

class StatesController extends BaseController
{

    protected $baseSingular = 'state';
    protected $basePlural = 'states';
    protected $likeAttributes = ['id', 'name', 'country_id'];

    protected function newObj()
    {
        return new State();
    }

    protected function query()
    {
        return State::query();
    }

    protected function beforeCreate($view)
    {
        $countries = array_column(Country::all()->toArray(), 'name', 'id');
        $view->with('countries', $countries);
    }

    protected function beforeEdit($view, $obj)
    {
        $countries = array_column(Country::all()->toArray(), 'name', 'id');
        $view->with('countries', $countries);
    }

}
