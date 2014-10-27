<?php

use \LaravelBook\Ardent\Ardent;

/**
 * City
 *
 * @property integer $id
 * @property string $name
 * @property integer $state_id
 * @property-read \State $state
 * @property-read \Illuminate\Database\Eloquent\Collection|\Place[] $places
 * @method static \Illuminate\Database\Query\Builder|\City whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\City whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\City whereStateId($value) 
 */
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