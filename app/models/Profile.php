<?php

use \LaravelBook\Ardent\Ardent;
class Profile extends Ardent 
{

	protected $table = 'profiles';
    protected $guarded = ['id'];
	public $timestamps = false;
    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public function user()
    {
    	return $this->belongsTo('User');
    }
}