<?php

class TagsController extends BaseController
{

	public function index()
    {
		$tags = Tag::all();
		return View::make('tags.index', compact('tags'));
	}

	public function create()
    {
		return View::make('tags.create');
	}

	public function store()
    {
        $tag = new Tag();
        if ($tag->save()) {
            return Redirect::route('tags.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('tags.create')->withErrors($tag->errors());
	}

	public function show($id)
    {
		$tag = Tag::findOrFail($id);
		return View::make('tags.show', compact('tag'));
	}

	public function edit($id)
    {
        $tag = Tag::find($id);
        return View::make('tags.edit', compact('tag'));
	}

	public function update($id)
    {
        $tag = Tag::find($id);
        $tag->fill(Input::all());
        if ($tag->updateUniques()) {
            return Redirect::route('tags.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('tags.edit')->withErrors($tag->errors());
	}

	public function destroy($id)
    {
		Tag::destroy($id);
		return Redirect::route('tags.index');
	}

}
