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
            'password_confirmation' =>'required|same:password'

            ));

        if($validator->fails()){
            return Redirect::route('changepassword')->withErrors($validator);
        } else{
            $user = User::find(Auth::user()->id);
            $old_password = Input::get('old_password');

            if(Hash::check($old_password, $user->getAuthPassword()))
            {
                $user->fill(Input::all());
                if($user->updateUniques()){
                    return Redirect::route('home')->with('message', Lang::get('Senha Alterada com sucesso.'));
                }
            }
        }
        dd('6540N008');
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
    public function getForgotPassword()
    {
        return View::make('users.forgot');
    }

    public function postForgotPassword()
    {
        $validator = Validator::make(Input::all(), [
            'email' => 'required|email'
        ]);
        if($validator->fails()){
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
                
                   dd('salvou');
                }else{
                    Kint::dump($user);
                }
            }
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
          Kint::dump($user);
        }
        else{
            dd('Rato');
        }
    }
}
}
