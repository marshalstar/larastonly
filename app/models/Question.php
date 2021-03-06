<?php

use \LaravelBook\Ardent\Ardent;

/**
 * Question
 *
 * @property integer $id
 * @property integer $title_id
 * @property string $name
 * @property boolean $is_about_assessable
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Question whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Question whereTitleId($value)
 * @method static \Illuminate\Database\Query\Builder|\Question whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Question whereIsAboutAssessable($value)
 * @method static \Illuminate\Database\Query\Builder|\Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Question whereUpdatedAt($value)
 * @property string $statement
 * @property integer $weight
 * @property-read \Illuminate\Database\Eloquent\Collection|\Alternative[] $alternatives
 * @method static \Illuminate\Database\Query\Builder|\Question whereStatement($value)
 * @method static \Illuminate\Database\Query\Builder|\Question whereWeight($value)
 * @property-read \Title $title
 * @property integer $typeQuestion_id
 * @property-read \TypeQuestion $type
 * @method static \Illuminate\Database\Query\Builder|\Question whereTypeQuestionId($value)
 */
class Question extends Ardent
{

    protected $table = 'questions';
    protected $guarded = ['id'];
    //public $timestamps = false;

    public static $rules = [
        // 'statement' => 'required|between:3,255|unique:questions',
        // 'is_about_assessable' => '',
        // 'weight' => 'required|numeric',
        // 'alternatives' => '',
    ];

    public static $customMessages = array(
        'required' => 'O campo :attribute é necessário.',
        'same'    => 'O campo :attribute e :other precisam ser iguais.',
        'size'    => 'O campo :attribute ter tamanho igual a :size.',
        'between' => 'O campo :attribute precisa estar entre :min e :max.',
        'in'      => 'O campo :attribute deve estar entre os seguintes valores: :values',
    );

    public static $relationsData = [
        'alternatives' => [self::BELONGS_TO_MANY, 'Alternative', 'table' => 'alternative_question'],
    ];

    public function afterValidate()
    {
        if ($this->isDirty(('alternatives'))) {
            unset($this->alternatives);
        }
        return true;
    }

    public function afterSave()
    {
        if ($this->isDirty(('alternatives'))) {
            foreach (Input::get('alternatives') as $alternative_id) {
                $this->alternatives()->attach($alternative_id);
            }
        }
    }

    public function alternatives()
    {
        return $this->belongsToMany('Alternative');
    }

    public function title()
    {
        return $this->belongsTo('Title');
    }

    public function type()
    {
        return $this->belongsTo('TypeQuestion');
    }

    public function authOrFail()
    {
        $userId = Auth::user()->id;
        $result = DB::table('questions')
            ->join('titles', 'questions.title_id', '=', 'titles.id')
            ->join('checklists', 'titles.checklist_id', '=', 'checklists.id')
            ->where('checklists.user_id', '=', $userId)
            ->where('questions.id', '=', $this->id)
            ->get(['questions.id']);

        if (!count($result)  && !Auth::user()->is_admin) {
            throw new Exception(Lang::get('questão inválida'));
        }
    }

}