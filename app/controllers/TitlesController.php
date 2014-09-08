<?php

class TitlesController extends Controller {

	/**
	 * Lista titles
	 *
	 * @return Response
	 */
	public function index() {
		$titles = Title::all();
		return View::make('titles.index', compact('titles'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de title
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('titles.create');
	}

	/**
	 * Salva title espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
		Title::create(Request::get());
		return Redirect::route('titles.index');
	}

	/**
	 * Mostra title específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$title = Title::findOrFail($id);
		return View::make('titles.show', compact('title'));
	}

	/**
	 * Mostra formulário de edição espefícico de title.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$title = Title::find($id);
		return View::make('titles.edit', compact('title'));
	}

	/**
	 * Atualiza title específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$title = Title::findOrFail($id);
		$title->update(Request::get());
		return Redirect::route('titles.index');
	}

	/**
	 * Remove title específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Title::destroy($id);
		return Redirect::route('titles.index');
	}

}
