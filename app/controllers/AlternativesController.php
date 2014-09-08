<?php

class AlternativesController extends Controller {

	/**
	 * Lista alternatives
	 *
	 * @return Response
	 */
	public function index() {
		$alternatives = Alternative::all();
		return View::make('alternatives.index', compact('alternatives'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de alternative
	 *
	 * @return Response
	 */
	public function create() {
        $types = [];
        foreach (Type::all() as $type) {
            $types[$type->id] = $type->name;
        }
	    return View::make('alternatives.create', compact('types'));
	}

	/**
	 * Salva alternative espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
        $alternative = new Alternative();
        if ($alternative->save()) {
            return Redirect::route('alternatives.index')->with('message', Lang::get('Salvo com sucesso'));
        }
        return Redirect::route('alternatives.create')->withErrors($alternative->errors());
	}

	/**
	 * Mostra alternative específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$alternative = Alternative::findOrFail($id);
		return View::make('alternatives.show', compact('alternative'));
	}

	/**
	 * Mostra formulário de edição espefícico de alternative.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$alternative = Alternative::find($id);
        $types = [];
        foreach (Type::all() as $type) {
            $types[$type->id] = $type->name;
        }
		return View::make('alternatives.edit', compact('alternative'), compact('types'));
	}

	/**
	 * Atualiza alternative específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
        $alternative = Alternative::find($id);
        $alternative->fill(Input::all());
        if ($alternative->updateUniques()) {
            return Redirect::route('alternatives.index')->with('message', Lang::get('Editado com sucesso'));
        }
        return Redirect::route('alternatives.create')->withErrors($alternative->errors());
	}

	/**
	 * Remove alternative específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Alternative::destroy($id);
		return Redirect::route('alternatives.index');
	}

}
