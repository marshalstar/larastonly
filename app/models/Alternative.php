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
 * @property-read \Type $type
 */
class Alternative extends Ardent
{

    protected $table = 'alternatives';
    protected $guarded = ['id'];
    public $timestamps = false;

    public static $rules = [
        // 'name' => 'required|unique:alternatives|between:3,255',
    ];

    public function questions()
    {
        return $this->belongsToMany('Question');
    }

    public function authOrFail($questionId)
    {
        $userId = Auth::user()->id;
        $result = DB::table('alternative_question')
            ->join('questions', 'questions.id', '=', 'alternative_question.question_id')
            ->join('titles', 'questions.title_id', '=', 'titles.id')
            ->join('checklists', 'titles.checklist_id', '=', 'checklists.id')
            ->join('users', 'checklists.user_id', '=', 'users.id')
            //->groupBy('users.id')
            ->where('alternative_question.alternative_id', '=', $this->id)
            ->where('questions.id', '=', $questionId)
            //->where('users.id', '=', $userId)
            ->get(['questions.id']);
        //->get([DB::raw('COUNT(users.id)')]);

        !d($result);
    }

}