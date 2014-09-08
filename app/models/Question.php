<?php

use \LaravelBook\Ardent\Ardent;

/**
 * Question
 *
 * @property integer $id
 * @property integer $title_id
 * @property string $name
 * @property boolean $is_about_assessable
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Question whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Question whereTitleId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Question whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\Question whereIsAboutAssessable($value) 
 * @method static \Illuminate\Database\Query\Builder|\Question whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Question whereUpdatedAt($value) 
 */
class Question extends Ardent
{

    protected $table = 'questions';
    protected $guarded = ['id'];

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'statement' => 'required|between:3,64|unique:questions',
        'is_about_assessable' => '',
        'weight' => 'numeric',
    ];

}