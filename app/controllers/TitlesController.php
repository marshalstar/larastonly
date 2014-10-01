<?php

class TitlesController extends BaseController
{

    protected $baseSingular = 'title';
    protected $basePlural = 'titles';
    protected $likeAttributes = ['id'];

    protected function newObj()
    {
        return new Title();
    }

    protected function query()
    {
        return Title::query();
    }

    public function beforeCreate($view)
    {
        $titles = [null => Lang::get('sem pai')] + array_column(Title::all()->toArray(), 'name', 'id');
        $view->with('titles', $titles);
    }

    public function beforeEdit($view, $obj)
    {
        $titles = [null => Lang::get('sem pai')] + array_column(Title::all()->toArray(), 'name', 'id');
        $view->with('titles', $titles);
    }

}
