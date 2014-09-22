<?php

use \LaravelBook\Ardent\Ardent;

/**
 * Checklist
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property integer $title_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Checklist whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Checklist whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Checklist whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Checklist whereTitleId($value)
 * @method static \Illuminate\Database\Query\Builder|\Checklist whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Checklist whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Evaluation[] $evaluations
 * @property-read \User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\Title[] $titles
 */
class Checklist extends Ardent
{

    protected $table = 'checklists';
    protected $guarded = ['id'];

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'name' => 'required|between:3,255|unique:checklists',
    ];

    public function evaluations() {
        return $this->hasMany('Evaluation');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function titles()
    {
        return $this->hasMany('Title');
    }

}