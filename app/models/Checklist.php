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
    public $timestamps = false;

    public static $rules = [
        'name' => 'required|between:3,255',
    ];

    public function evaluations()
    {
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

    public function questions()
    {
        return $this->hasManyThrough('Question', 'Title');
    }

    public static function search($keyword)
    {
        return static::where('name', 'LIKE', '%'.$keyword.'%')->paginate(3);
    }

    /**
     * @throws Exception
     */
    public function authOrFail()
    {
        if ($this->user_id != Auth::user()->id) {
            throw new Exception(Lang::get("checklist inválido"));
        }
    }

}