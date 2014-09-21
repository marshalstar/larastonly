<?php

class AlternativesController extends Controller
{

	/**
	 * Lista alternativas
	 *
	 * @return Response
	 */
	public function index()
    {
		$alternatives = Alternative::all();
		return View::make('alternatives.index', compact('alternatives'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de alternativa
	 *
	 * @return Response
	 */
	public function create()
    {
        $types = array_column(Type::all()->toArray(), 'name', 'id');
	    return View::make('alternatives.create')
            ->with('types', $types);
	}

	/**
	 * Salva alternativa espefíca no banco
	 *
	 * @return Response
	 */
	public function store()
    {
        $alternative = new Alternative();
        if ($alternative->save()) {
            return Redirect::route('alternatives.index')
                ->with('message', Lang::get('Salvo com sucesso'));
        }
        return Redirect::route('alternatives.create')
            ->withErrors($alternative->errors());
	}

	/**
	 * Mostra alternativa específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
    {
		$alternative = Alternative::findOrFail($id);
		return View::make('alternatives.show', compact('alternative'));
	}

	/**
	 * Mostra formulário de edição espefícica de alternativa.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
		$alternative = Alternative::find($id);
        $types = array_column(Type::all()->toArray(), 'name', 'id');
		return View::make('alternatives.edit')
            ->with('alternative', $alternative)
            ->with('types', $types);
	}

	/**
	 * Atualiza alternativa específica no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {
        $alternative = Alternative::find($id);
        $alternative->fill(Input::all());
        if ($alternative->updateUniques()) {
            return Redirect::route('alternatives.index')
                ->with('message', Lang::get('Editado com sucesso'));
        }
        return Redirect::route('alternatives.edit')
            ->withErrors($alternative->errors());
	}

	/**
	 * Remove alternativa específica do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
    {
		Alternative::destroy($id);
		return Redirect::route('alternatives.index');
	}

}
