<?php

class TagsController extends BaseController
{

	/**
	 * Lista tags
	 *
	 * @return Response
	 */
	public function index()
    {
		$tags = Tag::all();
		return View::make('tags.index', compact('tags'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de tag
	 *
	 * @return Response
	 */
	public function create()
    {
		return View::make('tags.create');
	}

	/**
	 * Salva tag espefíco no banco
	 *
	 * @return Response
	 */
	public function store()
    {
        $tag = new Tag();
        if ($tag->save()) {
            return Redirect::route('tags.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('tags.create')->withErrors($tag->errors());
	}

	/**
	 * Mostra tag específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
    {
		$tag = Tag::findOrFail($id);
		return View::make('tags.show', compact('tag'));
	}

	/**
	 * Mostra formulário de edição espefícico de tag.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
        $tag = Tag::find($id);
        return View::make('tags.edit', compact('tag'));
	}

	/**
	 * Atualiza tag específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {
        $tag = Tag::find($id);
        $tag->fill(Input::all());
        if ($tag->updateUniques()) {
            return Redirect::route('tags.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('tags.create')->withErrors($tag->errors());
	}

	/**
	 * Remove tag específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
    {
		Tag::destroy($id);
		return Redirect::route('tags.index');
	}

}
