<?php

class TitlesController extends BaseController
{

    protected $modelClassName = 'title';
    protected $likeAttributes = ['id', 'title_id', 'checklist_id', 'name'];

    public function beforeCreateOrEdit($view)
    {
        $titles = [null => Lang::get('sem pai')] + array_column(Title::all()->toArray(), 'name', 'id');
        $view->with('titles', $titles);
    }

}
