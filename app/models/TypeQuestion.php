<?php

use \LaravelBook\Ardent\Ardent;

/**
 * Type
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Type whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Type whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Type whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Alternative[] $alternatives
 * @property-read \Illuminate\Database\Eloquent\Collection|\Place[] $places
 * @property-read \Illuminate\Database\Eloquent\Collection|\Question[] $questions
 */
class TypeQuestion extends Ardent
{

    protected $table = 'typeQuestions';
    protected $guarded = ['id'];
    public $timestamps = false;

    public static $rules = [
        'name' => 'required|between:3,255|unique:typeQuestions',
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

    public function questions()
    {
        return $this->hasMany('Question');
    }

}