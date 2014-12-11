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

    public static $customMessages = array(
        'required' => 'O campo :attribute é necessário.',
        'same'    => 'O campo :attribute e :other precisam ser iguais.',
        'size'    => 'O campo :attribute ter tamanho igual a :size.',
        'between' => 'O campo :attribute precisa estar entre :min e :max.',
        'in'      => 'O campo :attribute deve estar entre os seguintes valores: :values',
        'name.required' => 'O campo nome é necessário.',
        'name.between' => 'O campo nome precisa estar entre :min e :max.',
    );

    public function state()
    {
        return $this->belongsTo('State');
    }

    public function places()
    {
        return $this->hasMany('Place');
    }

}