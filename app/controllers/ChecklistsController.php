<?php

class ChecklistsController extends BaseController
{

    protected $baseSingular = 'checklist';
    protected $basePlural = 'checklists';
    protected $likeAttributes = ['id', 'name', 'user_id'];

    protected function newObj()
    {
        return new Checklist();
    }

    protected function query()
    {
        return Checklist::query();
    }

    public function beforeCreateOrEdit($view)
    {
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $view->with('users', $users);
    }

	public function newChecklist()
	{
		return View::make("checklists.newChecklist");
	}

    public function save()
    {
        $tudo = Input::all();
        
        // var_dump($tudo);

        $titulos = [];
        $questoes = [];
        $alternativas = [];

        foreach ($tudo as $key => $value) {
            if($value["tipo"] == "alternativa")
            {
                salvarAlternativa($value);
            }
            else if($value["tipo"] == "questao")
            {
                
            }
            else if($value["tipo"] == "titulo")
            {

            }
        }

        // salvarTitulos();
        // salvarQuestoes();
        // salvarAlternativas();        
    }

    private function salvarAlternativa(){
        $a = Alternative::where("name", "=", $value["valor"])->get();
        $t = Type::where("name", "=", $value["tipo_alternativa"])->first();
        if(count($a) != 0)
        {

            $pular = false;
            foreach ($a as $v) 
                if( ($pular = ($v->type_id == $t->id) ) )
                    break;
            if($pular)
                return;
        }
        
        $alternativa = new Alternative;
        $alternativa->name = $value["valor"];
        $alternativa->type_id = $t->id;

        $alternativa->save();

        $alternativas[$value["id"]] = $alternativa;
    }

    public function getGraphics($id, $query = null)
    {


        $evaluations = Checklist::find($id)->evaluations;
        $answers = $evaluations[0]->answers;
        $alternativeQuestion = $answers[0]->alternativeQuestion;

        $ns = DB::table('checklists')
            ->join('evaluations', 'checklists.id', '=', 'evaluations.checklist_id')
            ->join('answers', 'evaluations.id', '=', 'answers.evaluation_id')
            ->join('alternative_question', 'answers.alternative_question_id', '=', 'alternative_question.id')
            ->join('questions', 'questions.id', '=', 'alternative_question.question_id')
            ->join('alternatives', 'alternatives.id', '=', 'alternative_question.alternative_id')
            ->groupBy('alternative_question.id')
            ->get(['alternatives.*', 'questions.*', 'alternative_question.*'])
            ;

        Kint::dump([
            $ns
        ]);

        die('rato');
        $evaluations = Evaluation::all();
        return View::make('checklists.graphics')
            ->with('checklist', $checklist);
    }

}
