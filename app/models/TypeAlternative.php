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
 */
class TypeAlternative extends Ardent
{

    protected $table = 'typeAlternatives';
    protected $guarded = ['id'];
    public $timestamps = false;

    public static $rules = [
        'name' => 'required|between:3,255|unique:typeAlternatives',
    ];

    public function alternatives()
    {
        return $this->hasMany('Alternative');
    }

    public function places()
    {
        return $this->hasMany('Place');
    }

}