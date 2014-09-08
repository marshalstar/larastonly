<?php

class EvaluationsController extends Controller
{

	/**
	 * Lista evaluations
	 *
	 * @return Response
	 */
	public function index()
    {
		$evaluations = Evaluation::all();
		return View::make('evaluations.index', compact('evaluations'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de evaluation
	 *
	 * @return Response
	 */
	public function create()
    {
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $checklists = array_column(Checklist::all()->toArray(), 'name', 'id');
		return View::make('evaluations.create')
            ->with('users', $users)
            ->with('checklists', $checklists);
	}

	/**
	 * Salva evaluation espefíco no banco
	 *
	 * @return Response
	 */
	public function store()
    {
        $evaluation = new Evaluation(Input::all());
        if ($evaluation->save()) {
            return Redirect::route('evaluations.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('evaluations.create')->withErrors($evaluation->errors());
	}

	/**
	 * Mostra evaluation específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
    {
		$evaluation = Evaluation::findOrFail($id);
		return View::make('evaluations.show', compact('evaluation'));
	}

	/**
	 * Mostra formulário de edição espefícico de evaluation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
		$evaluation = Evaluation::find($id);
        $users = array_column(User::all()->toArray(), 'username', 'id');
        $checklists = array_column(Checklist::all()->toArray(), 'name', 'id');
		return View::make('evaluations.edit', compact('evaluation'))
            ->with('users', $users)
            ->with('checklists', $checklists);
	}

	/**
	 * Atualiza evaluation específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {
        $evaluation = Evaluation::find($id);
        $evaluation->fill(Input::all());
        if ($evaluation->updateUniques()) {
            return Redirect::route('evaluations.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('evaluations.create')->withErrors($evaluation->errors());
	}

	/**
	 * Remove evaluation específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
    {
		Evaluation::destroy($id);
		return Redirect::route('evaluations.index');
	}

}
