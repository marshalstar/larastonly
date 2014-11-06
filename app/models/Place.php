<?php

use \LaravelBook\Ardent\Ardent;

/**
 * Place
 *
 * @property integer $id
 * @property string $name
 * @property integer $city_id
 * @property integer $tag_id
 * @property-read \City $city
 * @property-read \Type $type
 * @method static \Illuminate\Database\Query\Builder|\Place whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Place whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\Place whereCityId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Place whereTagId($value) 
 */
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
        return $this->belongsTo('TypePlace');
    }

}