<?php

class TitlesController extends BaseController
{

    protected $baseSingular = 'title';
    protected $basePlural = 'titles';
    protected $likeAttributes = ['id', 'title_id', 'checklist_id', 'name'];

    protected function newObj($attributes = array())
    {
        return new Title($attributes);
    }

    protected function query()
    {
        return Title::query();
    }

    public function beforeCreateOrEdit($view)
    {
        $titles = [null => Lang::get('sem pai')] + array_column(Title::all()->toArray(), 'name', 'id');
        $view->with('titles', $titles);
    }

}
