<?php

class PlacesController extends AdminBaseController
{

    protected $modelClassName = 'place';

    protected function beforeAdminCreateOrEdit($view)
    {
        $typePlaces = array_column(TypePlace::all(['id', 'name'])->toArray(), 'name', 'id');
        $cities = array_column(City::all(['id', 'name'])->toArray(), 'name', 'id');
        $view->with('typePlaces', $typePlaces)
             ->with('cities', $cities);
    }

}
