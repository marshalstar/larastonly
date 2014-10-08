<?php

use \LaravelBook\Ardent\Ardent;

class City extends Ardent
{

    protected $table = 'cities';
	protected $guarded = ['id'];
	public $timestamps = false;

    public static $rules = [
        'name' => 'required|between:3,255',
    ];

    public function state()
    {
        return $this->belongsTo('State');
    }

    public function places()
    {
        return $this->hasMany('Place');
    }

}