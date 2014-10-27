<?php

class AlternativesController extends AdminBaseController
{

    protected $modelClassName = 'alternative';

    public function beforeAdminCreateOrEdit($view)
    {
        $types = array_column(Type::all()->toArray(), 'name', 'id');
        $view->with('types', $types);
    }

    public function storeAjax()
    {
        $alternative = new Alternative(Input::except('question_id'));
        if ($alternative->save()) {
            if ($question_id = Input::get('question_id')) {
                $alternative->questions()->attach($question_id);
            }
            return $alternative;
        }
    }

    public function updateAjax($id)
    {
        $alternative = Alternative::find($id);
        $alternative->fill(Input::except('question_id'));
        if ($alternative->updateUniques()) {
            return $alternative;
        }
    }

}
