<?php

class ChecklistsController extends BaseController
{

    protected $modelClassName = 'checklist';

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

        $titulos = [];
        $questoes = [];
        $alternativas = [];

        foreach ($tudo as $key => $value) {

            if($value["tipo"] == "alternativa")
            {
                $a = Alternative::where("name", "=", $value["valor"])->get();
                $t = Type::where("name", "=", $value["tipo_alternativa"])->first();
                if(count($a) != 0)
                {

                    $pular = false;
                    foreach ($a as $v) 
                        if( ($pular = ($v->type_id == $t->id) ) )
                            break;
                    if($pular)
                    {
                        $alternativaQuestao = new AlternativeQuestion;
                        $alternativaQuestao->alternative_id = $v->id;
                        $alternativaQuestao->question_id = $questoes[$value["pai"]]->id;
                        $alternativaQuestao->save();
                        continue;
                    }
                }
                    
                $alternativa = new Alternative;
                $alternativa->name = $value["valor"];
                $alternativa->type_id = $t->id;

                $alternativa->save();

                $alternativaQuestao = new AlternativeQuestion;
                $alternativaQuestao->alternative_id = $alternativa->id;
                $alternativaQuestao->question_id = $questoes[$value["pai"]]->id;
                $alternativaQuestao->save();

                $alternativas[$value["id"]] = $alternativa;
            }
            else if($value["tipo"] == "questao")
            {
                $questao = new Question;
                $questao->statement = $value["valor"];

                $questao->title_id = $titulos[$value["pai"]]->id;

                $questao->save();

                $questoes[$value["id"]] = $questao;

                echo $questao->statement . " ";
            }
            else if($value["tipo"] == "titulo")
            {
                $titulo = new Title;
                $titulo->name = $value["valor"];

                $titulo->checklist_id = 1;

                if($value["id"] != "titulo_1")
                    $titulo->title_id = $titulos[$value["pai"]]->id;

                $titulo->save();
                //die('morre');

                $titulos[$value["id"]] = $titulo;

            }
        }/**/

        /*$checklist->titles()->attach(array_map(function($obj) {
            return $obj->id;
        }, $titulos));/**/
    }

    public function nyw()
    {
        $checklist = Checklist::firstOrCreate([
            'user_id' => 1,
            'name' => 'checklist',
        ]);
        /** @TODO: mandar o Yuri parar de ser preguiçoso e tirar este titulo root daqui! */
        $titleRoot = Title::firstOrCreate([
            'checklist_id' => $checklist->id,
            'name' => 'root',
        ]);
        $types = array_column(Type::all(['id', 'name'])->toArray(), 'name', 'id');
        return View::make('checklists.nyw')
            ->with('checklist', $checklist)
            ->with('titleRoot', $titleRoot)
            ->with('types', $types);
    }

    public function dataGraphicsAjax($checklistId)
    {
        $query = DB::table('checklists')
                    ->join('evaluations', 'checklists.id', '=', 'evaluations.checklist_id')
                    ->join('answers', 'evaluations.id', '=', 'answers.evaluation_id')
                    ->join('alternative_question', 'answers.alternative_question_id', '=', 'alternative_question.id')
                    ->join('alternatives', 'alternatives.id', '=', 'alternative_question.alternative_id')
                    ->join('questions', 'questions.id', '=', 'alternative_question.question_id')
                    ->join('titles', 'titles.id', '=', 'questions.title_id')
                    ->where('titles.checklist_id', '=', $checklistId)
                    ->where('checklists.id', '=', $checklistId)
                    ->groupBy('alternative_question.question_id')
                    ->groupBy('alternative_question.alternative_id')
                    ->orderBy('total', 'desc');

        if (is_array(Input::get('where'))) {
            foreach (Input::get('where') as $w) {
                $query->where(function ($q) use ($w) {
                    $q->where('answers.alternative_question_id', '!=', $w['alternative_question.question_id'])
                        ->where('alternative_question.alternative_id', '!=', $w['alternative_question.alternative_id']);
                });
            }
        }

        $stdData = $query->get([
                        'alternatives.name as alternativeName',
                        'alternatives.id as alternativeId',
                        'alternative_question.question_id as questionId',
                        'questions.statement as questionStatement',
                        DB::raw('COUNT(alternative_question.alternative_id) as total'),
                    ]);
        /** @TODO: manda o Yuri parar de ser babaca e parar de fazer esta conversão de stdClass para array inútil */
        $arrayData = json_decode(json_encode($stdData), true);
        $ns = [];
        foreach($arrayData as $arr) {
            $ns[$arr['questionId']]['data'][] = [
                Str::limit($arr['alternativeName'], 15),
                Str::limit($arr['total'], 15),
                Str::limit($arr['alternativeId'], 15),
            ];
            $ns[$arr['questionId']]['name'] = Str::limit($arr['questionStatement'], 15);
        }
        return $ns;
    }

    public function graphics($id, $query = null)
    {
        $checklist = Checklist::findOrFail($id);
        return View::make('checklists.graphics')
            ->with('checklist', $checklist);
    }

    public function responder($id)
    {
        $checklist = Checklist::find($id);

        $titulos = Title::where("checklist_id", "=", $id)->get();

        $questoes = [];

        $alternativas = [];
        
        foreach ($titulos as $value) {
            $questoes[$value->id] = Question::where('title_id', '=', $value->id)->get();
            
            foreach ($questoes[$value->id] as $vv) {
                $alternativaQuestao = AlternativeQuestion::where('question_id', '=', $vv->id)->get();

                foreach ($alternativaQuestao as $v) {
                    
                    $alternativas[$value->id] = Alternative::where("alternative_id", '=', $v->alternative_id);

                }
            }
        }



        return View::make("checklists.responderChecklist", 
            array("checklist" => $checklist, 
                "titulos" => $titulos, 
                "questoes" => $questoes
                )
            );
    }

}
