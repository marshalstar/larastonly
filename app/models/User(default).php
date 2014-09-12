<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * User2
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
 * @method static \Illuminate\Database\Query\Builder|\User2 whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\User2 whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\User2 whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\User2 wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\User2 whereSpeciality($value)
 * @method static \Illuminate\Database\Query\Builder|\User2 whereIsAdmin($value)
 * @method static \Illuminate\Database\Query\Builder|\User2 whereGender($value)
 * @method static \Illuminate\Database\Query\Builder|\User2 whereBiography($value)
 * @method static \Illuminate\Database\Query\Builder|\User2 wherePictureUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\User2 whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\User2 whereUpdatedAt($value)
 */
class User2 extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
