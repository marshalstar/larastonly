<?php namespace ;

use Illuminate\Routing\Controller;
use Redirect, Request;

class StatesController extends Controller {

	/**
	 * Lista states
	 *
	 * @return Response
	 */
	public function index() {
		$states = State::all();
		return view('states.index', compact('states'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de state
	 *
	 * @return Response
	 */
	public function create() {
		return view('states.create');
	}

	/**
	 * Salva state espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
		State::create(Request::get());
		return Redirect::route('states.index');
	}

	/**
	 * Mostra state específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$state = State::findOrFail($id);
		return view('states.show', compact('state'));
	}

	/**
	 * Mostra formulário de edição espefícico de state.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$state = State::find($id);
		return view('states.edit', compact('state'));
	}

	/**
	 * Atualiza state específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$state = State::findOrFail($id);
		$state->update(Request::get());
		return Redirect::route('states.index');
	}

	/**
	 * Remove state específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		State::destroy($id);
		return Redirect::route('states.index');
	}

}
