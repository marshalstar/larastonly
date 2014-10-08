<?php

use \LaravelBook\Ardent\Ardent;

class Country extends Ardent
{

    protected $table = 'countries';
	protected $guarded = ['id'];
	public $timestamps = false;

    public static $rules = [
        'name' => 'required|between:3,255',
    ];

    public function states()
    {
        return $this->hasMany('State');
    }

}