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
 */
class Answer extends Ardent
{

    protected $table = 'answers';
    protected $guarded = ['id'];

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [];

} 