<?php

class EvaluationsController extends Controller {

	/**
	 * Lista evaluations
	 *
	 * @return Response
	 */
	public function index() {
		$evaluations = Evaluation::all();
		return View::make('evaluations.index', compact('evaluations'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de evaluation
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('evaluations.create');
	}

	/**
	 * Salva evaluation espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
		Evaluation::create(Request::get());
		return Redirect::route('evaluations.index');
	}

	/**
	 * Mostra evaluation específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$evaluation = Evaluation::findOrFail($id);
		return View::make('evaluations.show', compact('evaluation'));
	}

	/**
	 * Mostra formulário de edição espefícico de evaluation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$evaluation = Evaluation::find($id);
		return View::make('evaluations.edit', compact('evaluation'));
	}

	/**
	 * Atualiza evaluation específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$evaluation = Evaluation::findOrFail($id);
		$evaluation->update(Request::get());
		return Redirect::route('evaluations.index');
	}

	/**
	 * Remove evaluation específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Evaluation::destroy($id);
		return Redirect::route('evaluations.index');
	}

}
