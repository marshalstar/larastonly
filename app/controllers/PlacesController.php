<?php

class PlacesController extends AdminBaseController
{

    protected $modelClassName = 'place';

    protected function beforeAdminCreateOrEdit($view)
    {
        $tags = array_column(Tag::all(['id', 'name'])->toArray(), 'name', 'id');
        $cities = array_column(City::all(['id', 'name'])->toArray(), 'name', 'id');
        $view->with('tags', $tags)
             ->with('cities', $cities);
    }

}
