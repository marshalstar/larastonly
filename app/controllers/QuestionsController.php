<?php namespace ;

use Illuminate\Routing\Controller;
use Redirect, Request;

class QuestionsController extends Controller {

	/**
	 * Lista questions
	 *
	 * @return Response
	 */
	public function index() {
		$questions = Question::all();
		return view('questions.index', compact('questions'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de question
	 *
	 * @return Response
	 */
	public function create() {
		return view('questions.create');
	}

	/**
	 * Salva question espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
		Question::create(Request::get());
		return Redirect::route('questions.index');
	}

	/**
	 * Mostra question específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$question = Question::findOrFail($id);
		return view('questions.show', compact('question'));
	}

	/**
	 * Mostra formulário de edição espefícico de question.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$question = Question::find($id);
		return view('questions.edit', compact('question'));
	}

	/**
	 * Atualiza question específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$question = Question::findOrFail($id);
		$question->update(Request::get());
		return Redirect::route('questions.index');
	}

	/**
	 * Remove question específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Question::destroy($id);
		return Redirect::route('questions.index');
	}

}
