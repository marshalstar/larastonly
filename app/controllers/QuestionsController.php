<?php

class QuestionsController extends Controller
{

	public function index()
    {
		$questions = Question::all();
		return View::make('questions.index', compact('questions'));
	}

	public function create()
    {
        $titles = array_column(Title::all()->toArray(), 'name', 'id');
		return View::make('questions.create')
            ->with('titles', $titles);
	}

	public function store()
    {
        $question = new Question();
        if ($question->save()) {
            return Redirect::route('questions.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('questions.create')->withErrors($question->errors());
	}

	public function show($id)
    {
		$question = Question::findOrFail($id);
		return View::make('questions.show', compact('question'));
	}

	public function edit($id)
    {
		$question = Question::find($id);
        $titles = array_column(Title::all()->toArray(), 'name', 'id');
		return View::make('questions.edit', compact('question'))
            ->with('titles', $titles);
	}

	public function update($id)
    {
        $question = Question::find($id);
        $question->is_about_assessable = Input::get('is_about_assessable') == 'on';
        $question->fill(Input::all());
        if ($question->updateUniques()) {
            return Redirect::route('questions.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('questions.edit')->withErrors($question->errors());
	}

	public function destroy($id)
    {
		Question::destroy($id);
		return Redirect::route('questions.index');
	}

}
