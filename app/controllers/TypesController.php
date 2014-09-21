<?php

class TypesController extends Controller
{

	public function index()
    {
		$types = Type::all();
		return View::make('types.index', compact('types'));
	}

	public function create()
    {
		return View::make('types.create');
	}

	public function store()
    {
        $type = new Type();
        if ($type->save()) {
            return Redirect::route('types.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('types.create')->withErrors($type->errors());
	}

	public function show($id)
    {
		$type = Type::findOrFail($id);
		return View::make('types.show', compact('type'));
	}

	public function edit($id)
    {
		$type = Type::find($id);
		return View::make('types.edit', compact('type'));
	}

	public function update($id)
    {
        $type = Type::find($id);
        $type->fill(Input::all());
        if ($type->updateUniques()) {
            return Redirect::route('types.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('types.edit')->withErrors($type->errors());
	}

	public function destroy($id)
    {
		Type::destroy($id);
		return Redirect::route('types.index');
	}

}
