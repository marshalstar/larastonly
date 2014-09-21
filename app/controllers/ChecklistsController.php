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


}
