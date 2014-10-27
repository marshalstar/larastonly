<?php

use \LaravelBook\Ardent\Ardent;

/**
 * Country
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\State[] $states
 * @method static \Illuminate\Database\Query\Builder|\Country whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Country whereName($value) 
 */
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