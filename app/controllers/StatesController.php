<?php

class StatesController extends AdminBaseController
{

    protected $modelClassName = 'state';

    protected function beforeAdminCreateOrEdit($view)
    {
        $countries = array_column(Country::all()->toArray(), 'name', 'id');
        $view->with('countries', $countries);
    }

}
