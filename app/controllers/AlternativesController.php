<?php

class AlternativesController extends BaseController
{

    protected $modelClassName = 'alternative';

    public function beforeCreateOrEdit($view)
    {
        $types = array_column(Type::all()->toArray(), 'name', 'id');
        $view->with('types', $types);
    }

    /*protected function logicStore()
    {
        $alternative = Alternative::firstOrCreate(Input::except('question_id'));
        //$alternative = $this->newObj();
        $this->beforeStore($alternative);
        if ($alternative->save()) {
            if ($question_id = Input::get('question_id')) {
                $alternative->questions()->attach($question_id);
            }
            return $alternative;
        }
    }/**/

}
