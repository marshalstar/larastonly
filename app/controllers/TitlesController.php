<?php

class TitlesController extends Controller
{

	public function index()
    {
		$titles = Title::all();
		return View::make('titles.index', compact('titles'));
	}

	public function create()
    {
        $titles = [null => Lang::get('sem pai')] + array_column(Title::all()->toArray(), 'name', 'id');
        return View::make('titles.create')
            ->with('titles', $titles);
	}

	public function store()
    {
        $title = new Title();
        if ($title->save()) {
            return Redirect::route('titles.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('titles.create')->withErrors($title->errors());
	}

	public function show($id)
    {
		$title = Title::findOrFail($id);
		return View::make('titles.show', compact('title'));
	}

	public function edit($id)
    {
		$title = Title::find($id);
        $titles = [null => Lang::get('sem pai')] + array_column(Title::all()->toArray(), 'name', 'id');
		return View::make('titles.edit')
            ->with('title', $title)
            ->with('titles', $titles);
	}

	public function update($id)
    {
        $title = Title::find($id);
        $title->fill(Input::all());
        if ($title->updateUniques()) {
            return Redirect::route('titles.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('titles.edit')->withErrors($title->errors());
	}

	public function destroy($id)
    {
		Title::destroy($id);
		return Redirect::route('titles.index');
	}

}
