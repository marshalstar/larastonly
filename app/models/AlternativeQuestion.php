<?php

use \LaravelBook\Ardent\Ardent;

/**
 * AlternativeQuestion
 *
 * @property integer $id
 * @property integer $alternative_id
 * @property integer $question_id
 * @property-read \Alternative $alternative
 * @property-read \Question $question
 * @method static \Illuminate\Database\Query\Builder|\AlternativeQuestion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\AlternativeQuestion whereAlternativeId($value)
 * @method static \Illuminate\Database\Query\Builder|\AlternativeQuestion whereQuestionId($value)
 */
class AlternativeQuestion extends Ardent
{

    protected $table = 'alternative_question';
    protected $guarded = ['id'];
    public $timestamps = false;

    public static $rules = [];

    public static $customMessages = array(
        'required' => 'O campo :attribute é necessário.',
        'same'    => 'O campo :attribute e :other precisam ser iguais.',
        'size'    => 'O campo :attribute ter tamanho igual a :size.',
        'between' => 'O campo :attribute precisa estar entre :min e :max.',
        'in'      => 'O campo :attribute deve estar entre os seguintes valores: :values',
    );

    public function alternative()
    {
        return $this->belongsTo('Alternative');
    }

    public function question()
    {
        return $this->belongsTo('Question');
    }

} 