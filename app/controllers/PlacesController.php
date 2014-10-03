<?php

class PlacesController extends BaseController
{

    protected $baseSingular = 'place';
    protected $basePlural = 'places';
    protected $likeAttributes = ['id', 'name', 'state_id', 'type_id'];

    protected function newObj()
    {
        return new Place();
    }

    protected function query()
    {
        return Place::query();
    }

    protected function beforeCreateOrEdit($view)
    {
        $types = array_column(Type::all()->toArray(), 'name', 'id');
        $states = array_column(State::all()->toArray(), 'name', 'id');
        $view->with('types', $types)
             ->with('states', $states);
    }

}
