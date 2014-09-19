<?php

use \LaravelBook\Ardent\Ardent;

/**
 * Alternative
 *
 * @property integer $id
 * @property string $statement
 * @property integer $type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Alternative whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Alternative whereStatement($value)
 * @method static \Illuminate\Database\Query\Builder|\Alternative whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\Alternative whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Alternative whereUpdatedAt($value)
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Question[] $questions
 * @method static \Illuminate\Database\Query\Builder|\Alternative whereName($value)
 */
class Alternative extends Ardent
{

    protected $table = 'alternatives';
    protected $guarded = ['id'];

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'name' => 'required|unique:alternatives|between:3,255',
    ];

    public function questions() {
        return $this->belongsToMany('Question');
    }

}