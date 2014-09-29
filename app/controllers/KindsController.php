<?php namespace ;

use Illuminate\Routing\Controller;
use Redirect, Request;

class KindsController extends Controller {

	/**
	 * Lista kinds
	 *
	 * @return Response
	 */
	public function index() {
		$kinds = Kind::all();
		return view('kinds.index', compact('kinds'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de kind
	 *
	 * @return Response
	 */
	public function create() {
		return view('kinds.create');
	}

	/**
	 * Salva kind espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
		Kind::create(Request::get());
		return Redirect::route('kinds.index');
	}

	/**
	 * Mostra kind específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$kind = Kind::findOrFail($id);
		return view('kinds.show', compact('kind'));
	}

	/**
	 * Mostra formulário de edição espefícico de kind.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$kind = Kind::find($id);
		return view('kinds.edit', compact('kind'));
	}

	/**
	 * Atualiza kind específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$kind = Kind::findOrFail($id);
		$kind->update(Request::get());
		return Redirect::route('kinds.index');
	}

	/**
	 * Remove kind específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Kind::destroy($id);
		return Redirect::route('kinds.index');
	}

}
