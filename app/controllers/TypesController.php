<?php

class TypesController extends BaseController
{

    protected $baseSingular = 'type';
    protected $basePlural = 'types';
    protected $likeAttributes = ['id', 'name'];

    protected function newObj()
    {
        return new Type();
    }

    protected function query()
    {
        return Type::query();
    }

}
