<?php

class EvaluationsController extends AdminBaseController
{

    protected $modelClassName = 'evaluation';

    public function beforeAdminCreateOrEdit($view)
    {
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $checklists = array_column(Checklist::all()->toArray(), 'name', 'id');
        $view->with('users', $users)
             ->with('checklists', $checklists);
    }


    //@TODO: voce sabe o que é (visualizarResposta está bugado, entao está sendo redirecionado)
	public function visualizarResposta($id)
    {
        $evaluation = Evaluation::find($id);

        return Redirect::route('checklists.graphics', $evaluation->checklist_id);

        return View::make("evaluations.visualizarResposta", array("evaluation" => $evaluation) );
    }

}
