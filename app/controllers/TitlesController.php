<?php

class TitlesController extends BaseController
{

    protected $modelClassName = 'title';

    public function beforeCreateOrEdit($view)
    {
        $titles = [null => Lang::get('sem pai')] + array_column(Title::all(['id', 'name'])->toArray(), 'name', 'id');
        $checklists = array_column(Checklist::all(['id', 'name'])->toArray(), 'name', 'id');
        $view->with('titles', $titles)
             ->with('checklists', $checklists);
    }

    public function destroyCascadeAjax($id)
    {
        $title = Title::findOrFail($id);
        $this->destroyTitle($title);
    }

    private function destroyTitle($title) {
        foreach($title->children as $t) {
            $this->destroyTitle($t);
        }
        foreach($title->questions as $q) {
            $q->alternatives()->delete();
            $q->delete();
        }
        $title->delete();
    }

}
