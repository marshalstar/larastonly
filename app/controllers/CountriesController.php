<?php

class CountriesController extends BaseController
{

    protected $baseSingular = 'country';
    protected $basePlural = 'countries';
    protected $likeAttributes = ['id', 'name'];

    protected function newObj($attributes = array())
    {
        return new Country($attributes);
    }

    protected function query()
    {
        return Country::query();
    }

}
