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
 * @property integer $typePlace_id
 * @method static \Illuminate\Database\Query\Builder|\Place whereTypePlaceId($value)
 */
class Place extends Ardent
{

    protected $table = 'places';
	protected $guarded = ['id'];
	public $timestamps = false;

    public static $rules = [
        'name' => 'required|between:3,255',
    ];

    public static $customMessages = array(
        'required' => 'O campo :attribute é necessário.',
        'same'    => 'O campo :attribute e :other precisam ser iguais.',
        'size'    => 'O campo :attribute ter tamanho igual a :size.',
        'between' => 'O campo :attribute precisa estar entre :min e :max.',
        'in'      => 'O campo :attribute deve estar entre os seguintes valores: :values',
        'name.required' => 'O campo nome é necessário.',
        'name.between' => 'O campo nome precisa estar entre :min e :max.',
    );

    public function city()
    {
        return $this->belongsTo('City');
    }

    public function type()
    {
        return $this->belongsTo('TypePlace');
    }

}