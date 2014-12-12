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

    /**
     * @return array
     */
    public function getDataGraphics()
    {
        $query = DB::table('checklists')
            ->join('evaluations', 'checklists.id', '=', 'evaluations.checklist_id')
            ->join('answers', 'evaluations.id', '=', 'answers.evaluation_id')
            ->join('alternative_question', 'answers.alternative_question_id', '=', 'alternative_question.id')
            ->join('alternatives', 'alternatives.id', '=', 'alternative_question.alternative_id')
            ->join('questions', 'questions.id', '=', 'alternative_question.question_id')
            ->join('titles', 'titles.id', '=', 'questions.title_id')
            ->where('titles.checklist_id', '=', $this->id)
            ->where('checklists.id', '=', $this->id)
            ->groupBy('alternative_question.question_id')
            ->groupBy('alternative_question.alternative_id')
            ->orderBy('total', 'desc');

        if (is_array(Input::get('where'))) {
            $checklistId = $this->id;
            $query->whereIn('evaluations.id', function($subQuery) use($checklistId) {
                $subQuery->select('evaluations.id')
                    ->from('evaluations')
                    ->join('checklists', 'checklists.id', '=', 'evaluations.checklist_id')
                    ->join('answers', 'evaluations.id', '=', 'answers.evaluation_id')
                    ->join('alternative_question', 'answers.alternative_question_id', '=', 'alternative_question.id')
                    ->where('checklists.id', '=', $checklistId);
                foreach (Input::get('where') as $w) {
                    $subQuery->where(function ($q) use ($w) {
                        $q->where('alternative_question.question_id', '=', $w['alternative_question.question_id'])
                            ->where('alternative_question.alternative_id', '!=', $w['alternative_question.alternative_id']);
                    });
                }
            });
        }

        $stdData = $query->get([
            'alternatives.name as alternativeName',
            'alternatives.id as alternativeId',
            'alternative_question.question_id as questionId',
            'questions.statement as questionStatement',
            DB::raw('COUNT(alternative_question.alternative_id) as total'),
        ]);

        $normalized = json_decode(json_encode($stdData), true);
        return $normalized;
    }

    /**
     * @param $search
     * @return \Illuminate\Pagination\Paginator
     */
    public static function fullSearch($search) {
        $keywords = trim($search);
        $keywords = preg_split('/\s+/', $keywords);
        ($count = Input::get('count')) || $count = 10;

        $query = DB::table('checklists')
            ->leftJoin('evaluations', 'checklists.id', '=', 'evaluations.checklist_id')
            ->leftJoin('places', 'evaluations.place_id', '=', 'places.id')
            ->leftJoin('cities', 'places.city_id', '=', 'cities.id')
            ->leftJoin('states', 'cities.state_id', '=', 'states.id')
            ->leftJoin('countries', 'states.country_id', '=', 'countries.id');

        $likes = [
            'checklists.name',
            'places.name',
            'checklists.description',
            'cities.name',
            'states.name',
            'countries.name',
            'evaluations.commentary',
        ];

        foreach($likes as $l) {
            foreach($keywords as $k) {
                $query->orWhere($l, 'like', "%$k%");
                $k = DB::connection()->getPdo()->quote("%$k%");
                $query->orderByRaw("$l LIKE $k DESC");
            }
        }
        $query->groupBy('checklists.id');
        $checklists = $query->paginate(10, ['checklists.*']);
        return $checklists;
    }

}