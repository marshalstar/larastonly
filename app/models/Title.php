<?php

use \LaravelBook\Ardent\Ardent;

/**
 * Title
 *
 * @property integer $id
 * @property integer $title_id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Title whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Title whereTitleId($value)
 * @method static \Illuminate\Database\Query\Builder|\Title whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Title whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Title whereUpdatedAt($value)
 * @property-read \Checklist $checklist
 */
class Title extends Ardent
{

    protected $table = 'titles';
    protected $guarded = ['id'];

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'name' => 'required|between:3,255|unique:titles',
    ];

    public function afterValidate()
    {
        if ($this->isDirty(('title_id')) && $this->title_id == 0) {
            $this->title_id = null;
        }
        return true;
    }

    public function checklist()
    {
        return $this->belongsTo('Checklist');
    }

}