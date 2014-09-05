<?php namespace ;

use Illuminate\Routing\Controller;
use Redirect, Request;

class AlternativesController extends Controller {

	/**
	 * Lista alternatives
	 *
	 * @return Response
	 */
	public function index() {
		$alternatives = Alternative::all();
		return view('alternatives.index', compact('alternatives'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de alternative
	 *
	 * @return Response
	 */
	public function create() {
		return view('alternatives.create');
	}

	/**
	 * Salva alternative espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
		Alternative::create(Request::get());
		return Redirect::route('alternatives.index');
	}

	/**
	 * Mostra alternative específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$alternative = Alternative::findOrFail($id);
		return view('alternatives.show', compact('alternative'));
	}

	/**
	 * Mostra formulário de edição espefícico de alternative.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$alternative = Alternative::find($id);
		return view('alternatives.edit', compact('alternative'));
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
