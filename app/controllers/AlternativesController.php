<?php

class AlternativesController extends Controller
{

	public function index()
    {
		$alternatives = Alternative::all();
		return View::make('alternatives.index', compact('alternatives'));
	}

	public function create()
    {
        $types = array_column(Type::all()->toArray(), 'name', 'id');
	    return View::make('alternatives.create')
            ->with('types', $types);
	}

	public function store()
    {
        $alternative = new Alternative();
        if ($alternative->save()) {
            return Redirect::route('alternatives.index')
                ->with('message', Lang::get('Salvo com sucesso'));
        }
        return Redirect::route('alternatives.create')
            ->withErrors($alternative->errors());
	}

	public function show($id)
    {
		$alternative = Alternative::findOrFail($id);
		return View::make('alternatives.show', compact('alternative'));
	}

	public function edit($id)
    {
		$alternative = Alternative::find($id);
        $types = array_column(Type::all()->toArray(), 'name', 'id');
		return View::make('alternatives.edit')
            ->with('alternative', $alternative)
            ->with('types', $types);
	}

	public function update($id)
    {
        $alternative = Alternative::find($id);
        $alternative->fill(Input::all());
        if ($alternative->updateUniques()) {
            return Redirect::route('alternatives.index')
                ->with('message', Lang::get('Editado com sucesso'));
        }
        return Redirect::route('alternatives.edit')
            ->withErrors($alternative->errors());
	}

	public function destroy($id)
    {
		Alternative::destroy($id);
		return Redirect::route('alternatives.index');
	}

}
