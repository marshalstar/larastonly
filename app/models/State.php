<?php

use \LaravelBook\Ardent\Ardent;

class State extends Ardent
{

    protected $table = 'states';
	protected $guarded = ['id'];
	public $timestamps = false;
	public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'name' => 'required|between:3,255',
    ];

    public function country()
    {
        return $this->belongsTo('Country');
    }

}