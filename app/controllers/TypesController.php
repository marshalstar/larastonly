<?php

class TypesController extends BaseController
{

    protected $baseSingular = 'type';
    protected $basePlural = 'types';
    protected $likeAttributes = ['id', 'name'];

    protected function newObj($attributes = array())
    {
        return new Type($attributes);
    }

    protected function query()
    {
        return Type::query();
    }

}
