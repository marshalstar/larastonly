<?php

use \LaravelBook\Ardent\Ardent;

class Place extends Ardent
{

    protected $table = 'places';
	protected $guarded = ['id'];
	public $timestamps = false;
	public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'name' => 'required|between:3,255',
    ];

    public function state()
    {
        return $this->belongsTo('State');
    }

    public function types()
    {
        return $this->belongsTo('Type');
    }

}