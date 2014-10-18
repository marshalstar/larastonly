<?php

class PlacesController extends BaseController
{

    protected $modelClassName = 'place';

    protected function beforeCreateOrEdit($view)
    {
        $types = array_column(Type::all(['id', 'name'])->toArray(), 'name', 'id');
        $cities = array_column(City::all(['id', 'name'])->toArray(), 'name', 'id');
        $view->with('types', $types)
             ->with('cities', $cities);
    }

}
