<?php

use \LaravelBook\Ardent\Ardent;

/**
 * Answer
 *
 * @property integer $id
 * @property integer $alternative_id
 * @property integer $evaluation_id
 * @property integer $question_id
 * @method static \Illuminate\Database\Query\Builder|\Answer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Answer whereAlternativeId($value)
 * @method static \Illuminate\Database\Query\Builder|\Answer whereEvaluationId($value)
 * @method static \Illuminate\Database\Query\Builder|\Answer whereQuestionId($value)
 * @property integer $alternative_question_id
 * @method static \Illuminate\Database\Query\Builder|\Answer whereAlternativeQuestionId($value)
 * @property-read \Evaluation $evaluation
 * @property-read \AlternativeQuestion $alternativeQuestion
 */
class Answer extends Ardent
{

    protected $table = 'answers';
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

    public function evaluation()
    {
        return $this->belongsTo('Evaluation');
    }

    public function alternativeQuestion()
    {
        return $this->belongsTo('AlternativeQuestion');
    }

} 