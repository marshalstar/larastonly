<?php

class UsersController extends Controller
{

	/**
	 * Lista users
	 *
	 * @return Response
	 */
	public function index()
    {
		$users = User::all();
		return View::make('users.index', compact('users'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de user
	 *
	 * @return Response
	 */
	public function create()
    {
		return View::make('users.create');
	}

	/**
	 * Salva user espefíco no banco
	 *
	 * @return Response
	 */
	public function store()
    {
        $user = new User();
        if ($user->save()) {
            return Redirect::route('users.index')->with('message', 'Seu perfil foi criado com sucesso, ative sua conta através do link enviado para seu e-mail!');
        }
        return Redirect::route('users.create')->withErrors($user->errors());
	}

	/**
	 * Mostra user específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
    {
        $user = User::findOrFail($id);
        return View::make('users.show', compact('user'));
	}

	/**
	 * Mostra formulário de edição espefícico de user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
        $user = User::find($id);
        return View::make('users.edit', compact('user'));
	}

	/**
	 * Atualiza user específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {
        $user = User::find($id);
        $user->is_admin = Input::get('is_admin') == 'on';
        $user->fill(Input::all());
        if ($user->updateUniques()) {
            return Redirect::route('users.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('users.edit')->withErrors($user->errors());
	}

	/**
	 * Remove user específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
    {
        User::destroy($id);
        return Redirect::route('users.index');
	}

    public function getActivate($code)
    {
        $user = User::where('code', '=', $code)->where('active', '=', 0);

        if ($user->count()) {
            $user = $user->first();

            $user->active = 1;
            $user->code = '';

            if ($user->updateUniques()) {
                return Redirect::route('home')->with('message', 'Sua conta foi ativada com sucesso!');
            }
        }
        return Redirect::route('home')->with('message', 'Não foi possível ativar sua conta, tente novamente mais tarde.');
        
    }

}
