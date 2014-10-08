<?php

use \LaravelBook\Ardent\Ardent;

class Place extends Ardent
{

    protected $table = 'places';
	protected $guarded = ['id'];
	public $timestamps = false;

    public static $rules = [
        'name' => 'required|between:3,255',
    ];

    public function city()
    {
        return $this->belongsTo('City');
    }

    public function type()
    {
        return $this->belongsTo('Type');
    }

}