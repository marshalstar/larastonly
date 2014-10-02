<?php

class ChecklistsController extends Controller
{

	public function index()
    {
		$checklists = Checklist::all();
		return View::make('checklists.index', compact('checklists'));
	}

	public function create()
    {
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $titles = array_column(Title::all()->toArray(), 'name', 'id');
		return View::make('checklists.create')
            ->with('users', $users)
            ->with('titles', $titles);
	}

	public function store()
    {
        $checklist = new Checklist();
        if ($checklist->save()) {
            return Redirect::route('checklists.index')
                ->with('message', Lang::get('Salvo com sucesso'));
        }
        return Redirect::route('checklists.create')
            ->withErrors($checklist->errors());
	}

	public function show($id)
    {
		$checklist = Checklist::findOrFail($id);
		return View::make('checklists.show', compact('checklist'));
	}

	public function edit($id)
    {
		$checklist = Checklist::find($id);
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $titles = array_column(Title::all()->toArray(), 'name', 'id');
		return View::make('checklists.edit')
            ->with('checklist', $checklist)
            ->with('users', $users)
            ->with('titles', $titles);
	}

	public function update($id)
    {
        $checklist = Checklist::find($id);
        $checklist->fill(Input::all());
        if ($checklist->updateUniques()) {
            return Redirect::route('checklists.index')
                ->with('message', Lang::get('Salvo com sucesso'));
        }
        return Redirect::route('checklists.edit')
            ->withErrors($checklist->errors());
	}

	public function destroy($id)
    {
		Checklist::destroy($id);
		return Redirect::route('checklists.index');
	}

	public function newChecklist()
	{
		return View::make("checklists.newChecklist");
	}

    public function save()
    {
        
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
