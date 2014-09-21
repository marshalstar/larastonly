<?php

class UsersController extends Controller
{

	public function index()
    {
		$users = User::all();
		return View::make('users.index', compact('users'));
	}

	public function create()
    {
		return View::make('users.create');
	}

	public function store()
    {
        $user = new User();
        $user->is_admin = Input::get('is_admin') == 'on';
        if ($user->save()) {
            return Redirect::route('users.index')->with('message', 'Seu perfil foi criado com sucesso, ative sua conta através do link enviado para seu e-mail!');
        }
        return Redirect::route('users.create')->withErrors($user->errors());
	}

	public function show($id)
    {
        $user = User::findOrFail($id);
        return View::make('users.show', compact('user'));
	}

	public function edit($id)
    {
        $user = User::find($id);
        return View::make('users.edit', compact('user'));
	}

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

	public function destroy($id)
    {
        User::destroy($id);
        return Redirect::route('users.index');
	}

    public function getActivate($code)
    {
        $users = User::where('code', '=', $code)->where('active', '=', 0);

        if ($users->count()) {
            $user = $users->first();
            $user->active = 1;
            $user->code = '';
            if ($user->updateUniques()) {
                return Redirect::route('home')->with('message', 'Sua conta foi ativada com sucesso!');
            }
        }
        return Redirect::route('home')->with('message', 'Não foi possível ativar sua conta, tente novamente mais tarde.');
    }

    public function getLogin()
    {
    	return View::make('users.login');
    }
    
    public function postLogin()
    {
        $user = User::where('email', '=', Input::get('email'))->get()[0];

        /* falta adicionar isto no usuário:

            class User extends Ardent implements UserInterface, RemindableInterface
            {

                use UserTrait, RemindableTrait;
        */


        Kint::dump(Auth::attempt([
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        ]));
        Kint::dump(Hash::check(Input::get('password'), $user->password));
        Kint::dump($user);

        if (Auth::attempt([
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        ])) {
            echo '<br/>valido';
        }
        echo '<br/>invalido';
    }
}
