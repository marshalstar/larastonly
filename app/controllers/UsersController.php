<?php namespace ;

use Illuminate\Routing\Controller;
use Redirect, Request;

class UsersController extends Controller {

	/**
	 * Lista users
	 *
	 * @return Response
	 */
	public function index() {
		$users = User::all();
		return view('users.index', compact('users'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de user
	 *
	 * @return Response
	 */
	public function create() {
		return view('users.create');
	}

	/**
	 * Salva user espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
		User::create(Request::get());
		return Redirect::route('users.index');
	}

	/**
	 * Mostra user específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$user = User::findOrFail($id);
		return view('users.show', compact('user'));
	}

	/**
	 * Mostra formulário de edição espefícico de user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$user = User::find($id);
		return view('users.edit', compact('user'));
	}

	/**
	 * Atualiza user específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$user = User::findOrFail($id);
		$user->update(Request::get());
		return Redirect::route('users.index');
	}

	/**
	 * Remove user específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		User::destroy($id);
		return Redirect::route('users.index');
	}

}
