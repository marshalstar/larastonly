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
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\Checklist whereDescription($value)
 */
class Checklist extends Ardent
{

    protected $table = 'checklists';
    protected $guarded = ['id'];
    public $timestamps = false;

    public static $rules = [
        'name' => 'required|between:3,255',
    ];

    public static $customMessages = array(
        'required' => 'O campo :attribute é necessário.',
        'same'    => 'O campo :attribute e :other precisam ser iguais.',
        'size'    => 'O campo :attribute ter tamanho igual a :size.',
        'between' => 'O campo :attribute precisa estar entre :min e :max.',
        'in'      => 'O campo :attribute deve estar entre os seguintes valores: :values',
        'required' => 'O campo :attribute é necessário.',
        'name.required' => 'O campo nome é necessário.',
        'name.between' => 'O campo nome precisa estar entre :min e :max.',
    );

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
        if ($this->user_id != Auth::user()->id && !Auth::user()->is_admin) {
            throw new Exception(Lang::get("checklist inválido"));
        }
    }

    /**
     * @return Question
     */
    public function lastQuestionUpdated()
    {
        $result = $this->questions()
                  ->orderBy('questions.updated_at', 'desc')
                  ->groupBy('questions.id')
                  ->limit(1)
                  ->get();

        if (count($result)) {
            return $result[0];
        }
    }

}