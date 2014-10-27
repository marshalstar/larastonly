<?php

use \LaravelBook\Ardent\Ardent;

/**
 * State
 *
 * @property integer $id
 * @property string $name
 * @property integer $country_id
 * @property-read \Country $country
 * @method static \Illuminate\Database\Query\Builder|\State whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\State whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\State whereCountryId($value) 
 */
class State extends Ardent
{

    protected $table = 'states';
	protected $guarded = ['id'];
	public $timestamps = false;

    public static $rules = [
        'name' => 'required|between:3,255',
    ];

    public function country()
    {
        return $this->belongsTo('Country');
    }

}