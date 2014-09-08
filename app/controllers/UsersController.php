<?php

class UsersController extends Controller {

	/**
	 * Lista users
	 *
	 * @return Response
	 */
	public function index() {
		$users = User::all();
		return View::make('users.index', compact('users'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de user
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('users.create');
	}

	/**
	 * Salva user espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
        $user = new User(Input::all());
        $user->is_admin = Input::get('is_admin') == 'on';
        if ($user->save()) {
            return Redirect::route('users.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('users.create')->withErrors($user->errors());
	}

	/**
	 * Mostra user específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
        $user = User::findOrFail($id);
        return View::make('users.show', compact('user'));
	}

	/**
	 * Mostra formulário de edição espefícico de user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
        $user = User::find($id);
        return View::make('users.edit', compact('user'));
	}

	/**
	 * Atualiza user específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
        $user = User::find($id);
        $user->fill(Input::all());
        if ($user->updateUniques()) {
            return Redirect::route('users.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('users.create')->withErrors($user->errors());
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
