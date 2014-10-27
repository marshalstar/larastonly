<?php

class UsersController extends BaseController
{

    protected $modelClassName = 'user';

    public function beforeStore($obj)
    {
        $obj->is_admin = Input::get('is_admin') == 'on';
    }


    public function getNew()
    {
        return View::make('users.new');
    }

    public function postNew()
    {
        $user = new User();
        $user->fill(Input::all());
        $user->is_admin = false;
        if ($user->save()) {
            return Redirect::route('home')
                ->with('message', Lang::get('Um link de ativação foi enviado para seu e-mail, por favor, confirme sua conta através deste link.'));
        }
        return Redirect::route('users.new')->withErrors($user->errors());
    }
     public function getEditUser($id)
    {
        $user = User::find($id);
        return View::make('users.editUser')
            ->with('user', $user);
    }
    public function postEditUser($id)
    {
        $user = User::find($id);
        $user->fill(Input::except('is_admin'));
        $user->updateUniques();
        return Redirect::route('home')->with('message', Lang::get('Perfil Editado com Sucesso'));

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
             return Redirect::route('users.login')
            ->with('message', Lang::get('Login falhou'))
            ->withInput(Input::except('password'));
        }
       
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('home');
    }

    public function getProfile()
    {
        echo 'me implementar. sou o UsersController@getProfile\n' ;
    }

    public function passwordEdit()
    {
        return View::make('users.password');
    }

    public function adminPasswordEdit($id)
    {
        $user = User::findOrFail($id);
        return View::make('users.password')
            ->with('user', $user);
    }

    public function passwordUpdate()
    {
        $validator = Validator::make(Input::all(), array(
            'oldPassword' =>'required',
            'password' => 'required',
            'passwordConfirmation' =>'required|same:password'
        ));

        if($validator->fails()) {
            return Redirect::route('password.edit')->withErrors($validator);
        }

        $user = User::find(Auth::user()->id);
        $oldPassword = Input::get('oldPassword');

        if(Hash::check($oldPassword, $user->getAuthPassword())) {
            $user->fill(Input::except(['oldPassword', 'passwordConfirmation']));
            $user->password = Hash::make($user->password);
            if($user->updateUniques()){
                return Redirect::route('home')->with('message', Lang::get('Senha Alterada com sucesso.'));
            }
        }
        return Redirect::route('password.edit')->withErrors($user->errors());
    }

    public function adminPasswordUpdate($id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make(Input::all(), array(
            'password' => 'required',
            'passwordConfirmation' =>'required|same:password'
        ));

        if($validator->fails()) {
            return Redirect::route('admin.password.edit', [$user->id])->withErrors($validator);
        }

        $user->fill(Input::except(['passwordConfirmation']));
        $user->password = Hash::make($user->password);
        if($user->updateUniques()){
            return Redirect::route('home')->with('message', Lang::get('Senha Alterada com sucesso.'));
        }
        return Redirect::route('admin.password.edit', [$user->id])->withErrors($user->errors());
    }

    public function loginWithFacebook()
    {
       $code = Input::get('code');
        $fb = OAuth::consumer('Facebook', 'http://localhost:8000/fb');

        if(!empty($code)) {
            $token = $fb->requestAccessToken($code);
            $result = json_decode($fb->request('/me'), true);
            $user = User::where('email', '=', $result['email'])->first();
            if(empty($user))
            {
                $user = new User();
                $user->username = $result['name'];
                $user->email = $result['email'];
                $user->is_admin = false;
                $user->active = $result['verified'];
                $user->biography = '';
                $user->picture_url = '';
                $user->speciality = '';
                $user->code = '';
                $user->password = Hash::make('teste');
                $user->save();
                }
                Auth::loginUsingId($user->getAuthIdentifier());
                return Redirect::to('http://localhost:8000/')->with('message', Lang::get('Logado via facebook'));
        }
        else {
            $url = $fb->getAuthorizationUri();
            return Redirect::to((string) $url);        
        }
    }

    public function getForgot()
    {
        return View::make('users.forgot');
    }

    public function postForgot()
    {
        $validator = Validator::make(Input::all(), [
            'email' => 'required|email'
        ]);
        if($validator->fails()) {
            return Redirect::to('forgot')->withErrors($validator);

        }  else{
            $user = User::where('email', '=', Input::get('email'));
            if($user->count())
            {
                $user = $user->first();
                $code = str_random(60);
                $password = str_random(10);
                $user->code = $code;
                $user->password_temp = Hash::make($password);
                if($user->updateUniques()){
                  Mail::send('emails.auth.forgot', array('link' => URL::route('recover', $code), 'username' => $user->username, 'password' => $password), function($message) use ($user){
                    $message->to($user->email, $user->username)->subject('Recuperação de Conta');
                  });
                  return Redirect::route('home')->with('message', Lang::get('Sua nova senha foi enviada por e-mail, utilize ela para efetuar o login novamente.'));
                }
            }
            return Redirect::to('forgot')->with('message', Lang::get('Email inválido.'));
        } 
    }

    public function getRecover($code){
        $user = User::where('code' ,'=', $code);
        if($user->count())
        {
            $user = $user->first();
            $user->password = $user->password_temp;
            $user->password_temp = '';
            $user->code = '';
            if($user->updateUniques()){
              return Redirect::route('home')->with('message', Lang::get('Conta recuperada com sucesso, você já pode efetuar seu login.'));
            }
            return Redirect::route('home')->with('message', Lang::get('Falha ao recuperar a conta.'));
        }
    }
    }
