<?php

use \LaravelBook\Ardent\Ardent;

/**
 * Evaluation
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $checklist_id
 * @property string $commentary
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Evaluation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Evaluation whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Evaluation whereChecklistId($value)
 * @method static \Illuminate\Database\Query\Builder|\Evaluation whereCommentary($value)
 * @method static \Illuminate\Database\Query\Builder|\Evaluation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Evaluation whereUpdatedAt($value)
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\Answer[] $answers
 * @property integer $place_id
 * @method static \Illuminate\Database\Query\Builder|\Evaluation wherePlaceId($value)
 */
class Evaluation extends Ardent
{

    protected $table = 'evaluations';
    protected $guarded = ['id'];
    public $timestamps = false;

    public static $rules = [
        'commentary' => '',
    ];

    public static $customMessages = array(
        'required' => 'O campo :attribute é necessário.',
        'same'    => 'O campo :attribute e :other precisam ser iguais.',
        'size'    => 'O campo :attribute ter tamanho igual a :size.',
        'between' => 'O campo :attribute precisa estar entre :min e :max.',
        'in'      => 'O campo :attribute deve estar entre os seguintes valores: :values',
    );

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function answers()
    {
        return $this->hasMany('Answer');
    }

}