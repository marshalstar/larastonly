<?php

use \LaravelBook\Ardent\Ardent;
use \Illuminate\Auth\UserTrait;
use \Illuminate\Auth\Reminders\RemindableTrait;
use \Illuminate\Auth\UserInterface;
use \Illuminate\Auth\Reminders\RemindableInterface;
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Evaluation[] $evaluations
 * @property-read \Illuminate\Database\Eloquent\Collection|\Checklists[] $checklists
 */
class User extends Ardent implements UserInterface, RemindableInterface
{
    use UserTrait, RemindableTrait;

    protected $table = 'users';
    protected $guarded = ['id'];
    protected $hidden = ['password', 'remember_token'];
    public $timestamps = false;
    public $autoPurgeRedundantAttributes = true;

    public static $rules = [
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'password_confirmation' => '',
        'speciality' => '',
        'is_admin' => '',
        'gender' => 'alpha_num|size:1',
        'biography' => '',
        'picture_url' => '',
        'code' => '',
        'active' => '',
    ];

    public static $customMessages = array(
        'required' => 'O campo :attribute é necessário.',
        'same'    => 'O campo :attribute e :other precisam ser iguais.',
        'size'    => 'O campo :attribute ter tamanho igual a :size.',
        'between' => 'O campo :attribute precisa estar entre :min e :max.',
        'in'      => 'O campo :attribute deve estar entre os seguintes valores: :values',
        'username.required' => 'O campo nome do usuário é necessário.',
        'email.required' => 'O campo email é necessário.',
        'email.email'    => 'O campo email e precisa ser um email válido.',
        'password.required' => 'O campo senha é necessário.',
        'gender.required' => 'O campo sexo é necessário.',
        'gender.alpha_num'    => 'O campo sexo precisa ser uma letra.',
        'gender.size'    => 'O campo sexo ter tamanho igual a :size.',
    );

    public function beforeSave()
    {
        if (!$this->active) {
            $this->password = Hash::make($this->password);
            $this->code = str_random(60);
            $this->active = 0;
        }
    }

    public function afterSave()
    {
        if (!$this->active) {
            $user = $this;
            Mail::send('emails.auth.activate', array('link' => URL::route('user-activate', $this->code), 'username' => $this->username), function ($message) use ($user) {
                $message->to($user->email, $user->username)->subject('Ative sua conta!');
            });
        }
    }

    public function evaluations()
    {
        return $this->hasMany('Evaluation');
    }

    public function checklists()
    {
        return $this->hasMany('Checklists');
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }


    public function getAuthPassword()
    {
        return $this->password;
    }

}