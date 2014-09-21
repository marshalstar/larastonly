<?php

class TitlesController extends Controller
{

	/**
	 * Lista titles
	 *
	 * @return Response
	 */
	public function index()
    {
		$titles = Title::all();
		return View::make('titles.index', compact('titles'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de title
	 *
	 * @return Response
	 */
	public function create()
    {
        $titles = [null => Lang::get('sem pai')] + array_column(Title::all()->toArray(), 'name', 'id');
        return View::make('titles.create')
            ->with('titles', $titles);
	}

	/**
	 * Salva title espefíco no banco
	 *
	 * @return Response
	 */
	public function store()
    {
        $title = new Title();
        if ($title->save()) {
            return Redirect::route('titles.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('titles.create')->withErrors($title->errors());
	}

	/**
	 * Mostra title específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
    {
		$title = Title::findOrFail($id);
		return View::make('titles.show', compact('title'));
	}

	/**
	 * Mostra formulário de edição espefícico de title.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
		$title = Title::find($id);
        $titles = [null => Lang::get('sem pai')] + array_column(Title::all()->toArray(), 'name', 'id');
		return View::make('titles.edit')
            ->with('title', $title)
            ->with('titles', $titles);
	}

	/**
	 * Atualiza title específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {
        $title = Title::find($id);
        $title->fill(Input::all());
        if ($title->updateUniques()) {
            return Redirect::route('titles.index')->with('message', 'Salvo com sucesso');
        }
        return Redirect::route('titles.edit')->withErrors($title->errors());
	}

	/**
	 * Remove title específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
    {
		Title::destroy($id);
		return Redirect::route('titles.index');
	}

}
