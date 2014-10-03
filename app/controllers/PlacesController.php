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

}
