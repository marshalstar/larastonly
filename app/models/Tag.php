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
 */
class Tag extends Ardent
{

	protected $table = 'tags';
    protected $guarded = ['id'];

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'name' => 'required|between:3,64|unique:tags',
    ];

}