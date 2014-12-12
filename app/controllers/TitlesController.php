<?php

class TitlesController extends AdminBaseController
{

    protected $modelClassName = 'title';

    public function beforeAdminCreateOrEdit($view)
    {
        $titles = [null => Lang::get('sem pai')] + array_column(Title::all(['id', 'name'])->toArray(), 'name', 'id');
        $checklists = array_column(Checklist::all(['id', 'name'])->toArray(), 'name', 'id');
        $view->with('titles', $titles)
             ->with('checklists', $checklists);
    }

    public function storeAjax()
    {
        $checklist = Checklist::findOrFail(Input::get('checklist_id'));
        $checklist->authOrFail();
        $title = new Title(Input::all());
        if ($title->save()) {
            return $title;
        }
    }

    public function updateAjax($id)
    {
        $title = Title::findOrFail($id);
        $title->authOrFail();
        $title->fill(Input::all());
        if ($title->updateUniques()) {
            return $title;
        }
    }

    public function destroyAjax($id)
    {
        $title = Title::findOrFail($id);
        $title->authOrFail();
        $title->destroyRecursive();
    }

}
