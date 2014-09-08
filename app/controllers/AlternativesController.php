<?php

class AlternativesController extends Controller {

	/**
	 * Lista alternatives
	 *
	 * @return Response
	 */
	public function index() {
		$alternatives = Alternative::all();
		return View::make('alternatives.index', compact('alternatives'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de alternative
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('alternatives.create');
	}

	/**
	 * Salva alternative espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
        $tag = new Tag();
        if ($tag->save()) {
            return Redirect::route('tags.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('tags.create')->withErrors($tag->errors());
	}

	/**
	 * Mostra alternative específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$alternative = Alternative::findOrFail($id);
		return View::make('alternatives.show', compact('alternative'));
	}

	/**
	 * Mostra formulário de edição espefícico de alternative.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$alternative = Alternative::find($id);
		return View::make('alternatives.edit', compact('alternative'));
	}

	/**
	 * Atualiza alternative específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$alternative = Alternative::findOrFail($id);
		$alternative->update(Request::get());
		return Redirect::route('alternatives.index');
	}

	/**
	 * Remove alternative específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Alternative::destroy($id);
		return Redirect::route('alternatives.index');
	}

}
