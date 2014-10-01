<?php

class AlternativesController extends BaseController
{

    protected $baseSingular = 'alternative';
    protected $basePlural = 'alternatives';
    protected $likeAttributes = ['id', 'name', 'type_id'];

    protected function newObj()
    {
        return new Alternative();
    }

    protected function query()
    {
        return Alternative::query();
    }

    public function beforeCreate($view)
    {
        $types = array_column(Type::all()->toArray(), 'name', 'id');
        $view->with('types', $types);
    }

    public function beforeEdit($view, $obj)
    {
        $types = array_column(Type::all()->toArray(), 'name', 'id');
        $view->with('types', $types);
    }

}
