<?php

class StatesController extends BaseController
{

    protected $modelClassName = 'state';
    protected $likeAttributes = ['id', 'name', 'country_id'];

    protected function beforeCreateOrEdit($view)
    {
        $countries = array_column(Country::all()->toArray(), 'name', 'id');
        $view->with('countries', $countries);
    }

}
