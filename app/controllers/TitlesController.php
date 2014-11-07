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
        /** @TODO: validar se o checklist é do usuário logado */
        $title = new Title(Input::all());
        if ($title->save()) {
            return $title;
        }
    }

    public function updateAjax($id)
    {
        /** @TODO: validar se o checklist é do usuário logado */
        $title = Title::find($id);
        $title->fill(Input::all());
        if ($title->updateUniques()) {
            return $title;
        }
    }

    public function destroyAjax($id)
    {
        /** @TODO: validar se o checklist é do usuário logado */
        $title = Title::findOrFail($id);
        $this->destroyTitle($title);
    }

    private function destroyTitle($title)
    {
        foreach($title->children as $t) {
            $this->destroyTitle($t);
        }
        foreach($title->questions as $q) {
            $q->alternatives()->detach();
            $q->delete();
        }
        $title->delete();
    }

}
