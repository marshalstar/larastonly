<?php

class ChecklistsController extends BaseController
{

    protected $baseSingular = 'checklist';
    protected $basePlural = 'checklists';
    protected $likeAttributes = ['id', 'name', 'user_id'];

    protected function newObj()
    {
        return new Checklist();
    }

    protected function query()
    {
        return Checklist::query();
    }

    public function beforeCreateOrEdit($view, $obj)
    {
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $view->with('users', $users);
    }

	public function newChecklist()
	{
		return View::make("checklists.newChecklist");
	}

    public function save()
    {
        var_dump( Input::all() );

        
    }

    public function getGraphics($id, $query = null)
    {


        $evaluations = Checklist::find($id)->evaluations;
        $answers = $evaluations[0]->answers;
        $alternativeQuestion = $answers[0]->alternativeQuestion;

        $ns = DB::table('checklists')
            ->join('evaluations', 'checklists.id', '=', 'evaluations.checklist_id')
            ->join('answers', 'evaluations.id', '=', 'answers.evaluation_id')
            ->join('alternative_question', 'answers.alternative_question_id', '=', 'alternative_question.id')
            ->join('questions', 'questions.id', '=', 'alternative_question.question_id')
            ->join('alternatives', 'alternatives.id', '=', 'alternative_question.alternative_id')
            ->groupBy('alternative_question.id')
            ->get(['alternatives.*', 'questions.*', 'alternative_question.*'])
            ;

        Kint::dump([
            $ns
        ]);

        die('rato');
        $evaluations = Evaluation::all();
        return View::make('checklists.graphics')
            ->with('checklist', $checklist);
    }

}
