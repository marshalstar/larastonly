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
 */
class Type extends Ardent
{

    protected $table = 'types';
    protected $guarded = ['id'];

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'name' => 'required|between:3,64|unique:types',
    ];

}