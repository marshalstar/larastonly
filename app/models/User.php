<?php

use \LaravelBook\Ardent\Ardent;

/**
 * User
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $speciality
 * @property boolean $is_admin
 * @property string $gender
 * @property string $biography
 * @property string $picture_url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereSpeciality($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereGender($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereBiography($value)
 * @method static \Illuminate\Database\Query\Builder|\User wherePictureUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereUpdatedAt($value)
 * @property integer $active
 * @property string $code
 * @property string $password_temp
 * @method static \Illuminate\Database\Query\Builder|\User whereActive($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\User wherePasswordTemp($value) 
 */
class User extends Ardent
{

    protected $table = 'users';
    protected $guarded = ['id'];
	protected $hidden = ['password'];

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public $autoPurgeRedundantAttributes = true;

    public static $rules = [
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'password_confirmation' => '',
        'speciality' => '',
        'is_admin' => '', // @TODO: fazer o boolean daqui funcionar (não funciona porque vem false ou 'on' do formulário)
        'gender' => 'required|alpha_num|size:1', // @TODO: tem que obrigar a ser 'f', 'm' ou 'o'
        'biography' => '',
        'picture_url' => '',
        'code' => '',
        'active' => '',
    ];

    /* @TODO o yuri vai arrumar esta draga
     'password' => 'required|confirmed',
        'password_confirmation' => 'required',

     */

    public function afterValidate()
    {
        if ($this->isDirty(('is_admin'))) {

            $is = $this->is_admin;
            if ($is == 'on') {
                $this->is_admin = true;
            }
        }
        return true;
    }

    public function beforeSave()
    {
        if (!$this->active) {
            $this->password = Hash::make($this->password);
            $this->code = str_random(60);
            $this->active = 0;
        }
        return true;
    }

    public function afterSave()
    {
        if (!$this->active) {
            $user = $this;
            Mail::send('emails.auth.activate', array('link' => URL::route('user-active', $this->code), 'username' => $this->username), function ($message) use ($user) {
                $message->to($user->email, $user->username)->subject('Ative sua conta!');
            });
        }
    }

}