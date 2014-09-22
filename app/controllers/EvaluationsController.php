<?php

class EvaluationsController extends Controller
{

	public function index()
    {
		$evaluations = Evaluation::all();
		return View::make('evaluations.index', compact('evaluations'));
	}

	public function create()
    {
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $checklists = array_column(Checklist::all()->toArray(), 'name', 'id');
		return View::make('evaluations.create')
            ->with('users', $users)
            ->with('checklists', $checklists);
	}

	public function store()
    {
        $evaluation = new Evaluation(Input::all());
        if ($evaluation->save()) {
            return Redirect::route('evaluations.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('evaluations.create')->withErrors($evaluation->errors());
	}

	public function show($id)
    {
		$evaluation = Evaluation::findOrFail($id);
		return View::make('evaluations.show', compact('evaluation'));
	}

	public function edit($id)
    {
		$evaluation = Evaluation::find($id);
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $checklists = array_column(Checklist::all()->toArray(), 'name', 'id');
		return View::make('evaluations.edit', compact('evaluation'))
            ->with('users', $users)
            ->with('checklists', $checklists);
	}

	public function update($id)
    {
        $evaluation = Evaluation::find($id);
        $evaluation->fill(Input::all());
        if ($evaluation->updateUniques()) {
            return Redirect::route('evaluations.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('evaluations.edit')->withErrors($evaluation->errors());
	}

	public function destroy($id)
    {
		Evaluation::destroy($id);
		return Redirect::route('evaluations.index');
	}

}
