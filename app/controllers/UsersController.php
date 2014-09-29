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
            return Redirect::route('users.index')->with('message', Lang::get('Editado com sucesso'));
        }
        return Redirect::route('users.edit')->withErrors($user->errors());
	}

	public function destroy($id)
    {
        User::destroy($id);
        return Redirect::route('users.index');
	}

    public function getNew()
    {
        return View::make('users.new');
    }

    public function postNew()
    {
        $user = new User();
        $user->is_admin = false;
        if ($user->save()) {
            return Redirect::route('users.index')
                ->with('message', Lang::get('Seu perfil foi criado com sucesso. Ative sua conta através do link enviado para seu e-mail!'));
        }
        return Redirect::route('users.create')->withErrors($user->errors());
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
        $remember = (Input::has('remember')) ? true : false;
        $auth = Auth::attempt([
            'password' => Input::get('password'),
            'email' => Input::get('email'),
            'active' => 1
        ], $remember); 
        if($auth){
            return Redirect::route('home')->with('message', Lang::get('Login com sucesso'));
        }
            
        else{
             return Redirect::route('users')
            ->with('message', Lang::get('Login falhou'))
            ->withInput(Input::except('password'));
        }
       
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('home');
    }
    public function getChangePassword()
    {
        
        return View::make('users.password');
    }

    public function getProfile()
    {
        echo 'me implementar. sou o UsersController@getProfile\n' ;
    }

    public function postChangePassword()
    {
        $validator = Validator::make(Input::all(), array(
            'old_password' =>'required',
            'password' => 'required',
            'password_again' =>'required|same:password'

            ));

        if($validator->fails()){
            return Redirect::route('changepassword')->withErrors($validator);
        }
        else{
            $user = User::find(Auth::user()->id);
            $old_password = Input::get('old_password');
            $password = Input::get('password');

            if(Hash::check($old_password, $user->getAuthPassword()))
            {
                $user->password = Hash::make($password);
                if($user->save()){
                    return Redirect::route('home')->with('message', Lang::get('Senha Alterada com sucesso.'));
                }
                
            
           
        }
        }
        
        Kint::dump($user);
}
}
