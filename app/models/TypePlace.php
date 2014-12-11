<?php

use \LaravelBook\Ardent\Ardent;

/**
 * Tag
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Tag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Tag whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Tag whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Checklist[] $checklists
 * @property-read \Illuminate\Database\Eloquent\Collection|\Place[] $places
 */
class TypePlace extends Ardent
{

	protected $table = 'typePlaces';
    protected $guarded = ['id'];
    public $timestamps = false;

    public static $rules = [
        'name' => 'required|between:3,255|unique:typePlaces',
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

    public function places()
    {
        return $this->hasMany('Place');
    }

}