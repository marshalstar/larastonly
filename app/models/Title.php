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
 * @property integer $checklist_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Question[] $questions
 * @method static \Illuminate\Database\Query\Builder|\Title whereChecklistId($value)
 * @property-read \Title $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Title[] $children
 */
class Title extends Ardent
{

    protected $table = 'titles';
    protected $guarded = ['id'];
    public $timestamps = false;

    public static $rules = [
        // 'name' => 'required|between:3,255|unique:titles',
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

    public function questions()
    {
        return $this->hasMany('Question');
    }

    public function parent()
    {
        return $this->belongsTo('Title', 'title_id');
    }

    public function children()
    {
        return $this->hasMany('Title', 'title_id');
    }

    public function authOrFail()
    {
        $userId = Auth::user()->id;
        $result = DB::table('titles')
            ->join('checklists', 'titles.checklist_id', '=', 'checklists.id')
            ->where('checklists.user_id', '=', $userId)
            ->where('titles.id', '=', $this->id)
            ->get(['titles.id']);

        if (!count($result) && !Auth::user()->is_admin) {
            throw new Exception(Lang::get('título inválido'));
        }
    }

}