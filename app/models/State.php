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

    public static $customMessages = array(
        'required' => 'O campo :attribute é necessário.',
        'same'    => 'O campo :attribute e :other precisam ser iguais.',
        'size'    => 'O campo :attribute ter tamanho igual a :size.',
        'between' => 'O campo :attribute precisa estar entre :min e :max.',
        'in'      => 'O campo :attribute deve estar entre os seguintes valores: :values',
        'name.required' => 'O campo nome é necessário.',
        'name.between' => 'O campo nome precisa estar entre :min e :max.',
    );

    public function country()
    {
        return $this->belongsTo('Country');
    }

}