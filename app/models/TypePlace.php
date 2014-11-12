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

    public function places()
    {
        return $this->hasMany('Place');
    }

}