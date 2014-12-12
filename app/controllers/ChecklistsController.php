<?php

class ChecklistsController extends AdminBaseController
{

    protected $modelClassName = 'checklist';

    public function beforeAdminCreateOrEdit($view)
    {
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $view->with('users', $users);
    }

    public function updateAjax($id)
    {
        $checklist = Checklist::findOrFail($id);
        $checklist->authOrFail();
        $checklist->fill(Input::all());
        if ($checklist->updateUniques()) {
            return $checklist;
        }
    }

    public function destroyAjax($id)
    {
        $checklist = Checklist::findOrFail($id);
        foreach($checklist->evaluations as $evaluation) {
            $evaluation->destroyRecursive();
        }
        $checklist->authOrFail();
        foreach($checklist->titles as $title) {
            $title->destroyRecursive();
        }
        $checklist->delete();
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

    public function create()
    {
        $checklist = new Checklist;
        $checklist->user_id = Auth::user()->id;
        $checklist->name = Lang::get("checklist exemplo");
        $checklist->save();

        $title = new Title;
        $title->name = Lang::get("título exemplo");
        $title->checklist_id = $checklist->id;
        $title->save();

        $question = new Question;
        $question->statement = Lang::get("questão exemplo");
        $question->title_id = $title->id;
        $question->typeQuestion_id = TypeQuestion::first()->id;
        $question->save();

        $question->alternatives()->attach(Alternative::first());

        return Redirect::route('checklists.edit', [$checklist->id]);
    }

    public function edit($id)
    {
        $checklist = Checklist::findOrFail($id);
        $checklist->authOrFail();
        $typeQuestions = array_column(TypeQuestion::all(['id', 'name'])->toArray(), 'name', 'id');
        return View::make('checklists.edit')
            ->with('checklist', $checklist)
            ->with('typeQuestions', $typeQuestions);
    }

    public function dataGraphicsAjax($checklistId)
    {
        $arrayData = Checklist::findOrFail($checklistId)->getDataGraphics();
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


    public function answerCreate($id)
    {
        // $pdf = App::make('dompdf');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
        $checklist = Checklist::find($id);
        return View::make("checklists.answer")
            ->with('checklist', $checklist);
    }

    public function printPdf($id)
    {
        $ht = $this->renderTitle(Title::whereChecklistId($id)->whereTitleId(null)->get(), 3);
        // die($ht);
        $pdf = App::make('dompdf');
        $pdf->loadHTML($ht);
        return $pdf->stream(); 
    }

    public function answerStore($id)
    {
        
        $evaluation = new Evaluation;

        $country = Country::firstOrCreate(['name' => Input::get('country')]);
        $country->save();
        $state = State::firstOrCreate(['name' => Input::get('state'), 'country_id' => $country->id]);
        $state->save();
        $city = City::firstOrCreate(['name' => Input::get('city'), 'state_id' => $state->id]);
        $city->save();
        $place = Place::firstOrCreate(['name' => Input::get('place'), 'city_id' => $city->id]);
        $place->save();

        $evaluation->user_id = Auth::user()->id;
        $evaluation->checklist_id = $id;
        $evaluation->place_id = $place->id;
        $evaluation->save();

        foreach (Input::except(['place', 'city', 'state', 'country', 'commentary']) as $questionId => $alternativeId) {
            $alternativeQuestion = AlternativeQuestion::firstOrCreate([
                'alternative_id' => $alternativeId,
                'question_id' => $questionId
            ]);
            $alternativeQuestion->save();
            $answer = new Answer;
            $answer->alternative_question_id = $alternativeQuestion->id;
            $answer->evaluation_id = $evaluation->id;
            $answer->save();
        }

        return Redirect::route('evaluationsVisualizarResposta', $evaluation->id);
    }

    public function getResults($keyword)
    {
        return View::make('checklists.results')->with('title', 'Resultados da busca.')->with('checklists', Checklist::search($keyword));

    }

    public function postResults()
    {
        $keyword = Input::get('keyword');
        if(empty($keyword)){
            return Redirect::route('home')->with('message', Lang::get('Sua busca não encontrou resultados.'));
        }
        return Redirect::to('results/'.$keyword);
    }

    public function displayChecklist(){
        $result = DB::table('checklists')->where('name' ,'!=' ,'')->orderBy('name', 'DESC');
        return View::make('home')->with('result', $result);

    }

    /*public function pesquisar()
    {
        return View::make("checklists.pesquisar");
    }/**/

    public function renderTitle($titles, $layer) {
        $h = '';
        foreach($titles as $t):
            $h .=
            // echo
             '<div class="panel panel-default title" data-id="'.$t->id.'" data-layer="'.$layer.'" style="padding: 10px; border-color: #fff">

                <div class="panel-heading clearfix">
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10">
                            <h'.$layer.'>'.$t->name.'</h'. $layer .'>
                        </div>
                    </div>
                </div>

                <div class="list-group">
                    <div class="questions">
                        '. $this->renderQuestion($t) .'
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row titles">
                            '. $this->renderTitle($t->children, ++$layer) .'
                    </div>
                </div>
            </div>';
        endforeach;
        return $h;
    }

    public function renderQuestion($title) {
        $h = '';
        foreach($title->questions as $q):
        $h .= 
            '<div class="list-group-item question" data-id="'. $q->id .'">

                <div class="row form-group">
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10">
                        '. $q->statement .'
                    </div>
                </div>

                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10">
                    <div >
                        '. $this->renderAlternative($q) .'
                    </div>
                </div>

                <div class="row"></div>
            </div>';
        endforeach;
        return $h;
    }

    public function renderAlternative($question) {
        $h = '';
        foreach($question->alternatives as $a):
            $h .= '&nbsp;&nbsp;&nbsp; &lt;&gt;&loz;' . $a->name . '<br/>';
            // '<input type="'. TypeQuestion::findOrFail($question->typeQuestion_id)->name .'" name="'. $question->id .'" id="'. $question->id .'" value="'. $a->id .'"> '. $a->name ;
        endforeach;
        return $h . '<br/>';
    }

    public function search()
    {
        $search = trim(Input::get('keywords'));
        $checklists = Checklist::fullSearch($search);

        return View::make('checklists.search')
            ->with('checklists', $checklists)
            ->with('search', $search);
    }

}
