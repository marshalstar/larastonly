<?php namespace ;

use Eloquent;

class User extends Eloquent {

	protected $table = 'User';

	protected $hidden = ['id'];

}