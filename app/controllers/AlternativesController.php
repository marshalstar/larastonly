<?php

class AlternativesController extends BaseController
{

    protected $modelClassName = 'alternative';
    protected $likeAttributes = ['id', 'name', 'type_id'];

    public function beforeCreateOrEdit($view)
    {
        $types = array_column(Type::all()->toArray(), 'name', 'id');
        $view->with('types', $types);
    }

}
