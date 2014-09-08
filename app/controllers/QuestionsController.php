<?php

class QuestionsController extends Controller
{

	/**
	 * Lista questions
	 *
	 * @return Response
	 */
	public function index()
    {
		$questions = Question::all();
		return View::make('questions.index', compact('questions'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de question
	 *
	 * @return Response
	 */
	public function create()
    {
		return View::make('questions.create');
	}

	/**
	 * Salva question espefíco no banco
	 *
	 * @return Response
	 */
	public function store()
    {
        $question = new Question();
        if ($question->save()) {
            return Redirect::route('questions.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('questions.create')->withErrors($question->errors());
	}

	/**
	 * Mostra question específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
    {
		$question = Question::findOrFail($id);
		return View::make('questions.show', compact('question'));
	}

	/**
	 * Mostra formulário de edição espefícico de question.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
		$question = Question::find($id);
		return View::make('questions.edit', compact('question'));
	}

	/**
	 * Atualiza question específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {
        $question = Question::find($id);
        $question->fill(Input::all());
        if ($question->updateUniques()) {
            return Redirect::route('questions.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('questions.create')->withErrors($question->errors());
	}

	/**
	 * Remove question específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
    {
		Question::destroy($id);
		return Redirect::route('questions.index');
	}

}
