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

	/**
	 * Salva user espefíco no banco
	 *
	 * @return Response
	 */

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

	public function getCreate()
	{
		return View::make('users.create');
	}

	public function postCreate()
	{
		$user = new \User(\Input::all());
		$validator = \Validator::make(\Input::all(), \User::$rules);
		if($validator->fails()){
			return Redirect::route('users-create')->withErrors($validator)->withInput();
		} else{
			$email = Input::get('email');
			$username = Input::get('username');
			$password = Input::get('password');

			$speciality = Input::get('speciality');
			$is_admin = Input::get('is_admin');
			$gender = Input::get('gender');
			$biography = Input::get('biography');
			$picture_url = Input::get('picture_url');
			$code = str_random(60);
			$user = User::create(array(
				'username' => $username,
				'email' => $email,
				'password' => Hash::make($password),
				'speciality'=> $speciality,
				'is_admin' => $is_admin,
				'gender' => $gender,
				'biography' => $biography,
				'picture_url' => $picture_url,
				'code' => $code,
				'active' => 0
				));
			if($user){

				Mail::send('emails.auth.activate', array('link' =>URL::route('users-activate', $code), 'username' => $username), function($message) use ($user){

					$message->to($user->email, $user->username)->subject('Ative sua conta no Listonly');
				});
				return Redirect::route('users.index');
			}
		}
	}
	public function getActivate($code)
	{
		$user = User::where('code', '=', $code)->where('active', '=', 0);
			if($user->count()){
				$user = $user->first();
				echo '<pre>', print_r($user), '</pre>';
			}
	}
}