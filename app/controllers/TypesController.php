<?php namespace ;

use Illuminate\Routing\Controller;
use Redirect, Request;

class TypesController extends Controller {

	/**
	 * Lista types
	 *
	 * @return Response
	 */
	public function index() {
		$types = Type::all();
		return view('types.index', compact('types'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de type
	 *
	 * @return Response
	 */
	public function create() {
		return view('types.create');
	}

	/**
	 * Salva type espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
		Type::create(Request::get());
		return Redirect::route('types.index');
	}

	/**
	 * Mostra type específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$type = Type::findOrFail($id);
		return view('types.show', compact('type'));
	}

	/**
	 * Mostra formulário de edição espefícico de type.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$type = Type::find($id);
		return view('types.edit', compact('type'));
	}

	/**
	 * Atualiza type específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$type = Type::findOrFail($id);
		$type->update(Request::get());
		return Redirect::route('types.index');
	}

	/**
	 * Remove type específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Type::destroy($id);
		return Redirect::route('types.index');
	}

}
