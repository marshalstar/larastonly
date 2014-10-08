<?php

class PlacesController extends BaseController
{

    protected $baseSingular = 'place';
    protected $basePlural = 'places';
    protected $likeAttributes = ['id', 'name', 'city_id', 'type_id'];

    protected function newObj($attributes = array())
    {
        return new Place($attributes);
    }

    protected function query()
    {
        return Place::query();
    }

    protected function beforeCreateOrEdit($view)
    {
        $types = array_column(Type::all(['id', 'name'])->toArray(), 'name', 'id');
        $cities = array_column(City::all(['id', 'name'])->toArray(), 'name', 'id');
        $view->with('types', $types)
             ->with('cities', $cities);
    }

}
