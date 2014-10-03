<?php

class CountriesController extends BaseController
{

    protected $baseSingular = 'country';
    protected $basePlural = 'countries';
    protected $likeAttributes = ['id', 'name'];

    protected function newObj()
    {
        return new Country();
    }

    protected function query()
    {
        return Country::query();
    }

}
