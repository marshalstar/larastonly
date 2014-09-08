<?php

class ChecklistsController extends Controller
{

	/**
	 * Lista checklists
	 *
	 * @return Response
	 */
	public function index()
    {
		$checklists = Checklist::all();
		return View::make('checklists.index', compact('checklists'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de checklist
	 *
	 * @return Response
	 */
	public function create()
    {
		return View::make('checklists.create');
	}

	/**
	 * Salva checklist espefíco no banco
	 *
	 * @return Response
	 */
	public function store()
    {
        $checklist = new Checklist();
        if ($checklist->save()) {
            return Redirect::route('checklists.index')->with('message', Lang::get('Salvo com sucesso'));
        }
        return Redirect::route('checklists.create')->withErrors($checklist->errors());
	}

	/**
	 * Mostra checklist específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
    {
		$checklist = Checklist::findOrFail($id);
		return View::make('checklists.show', compact('checklist'));
	}

	/**
	 * Mostra formulário de edição espefícico de checklist.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
		$checklist = Checklist::find($id);
		return View::make('checklists.edit', compact('checklist'));
	}

	/**
	 * Atualiza checklist específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {
        $checklist = Checklist::find($id);
        $checklist->fill(Input::all());
        if ($checklist->updateUniques()) {
            return Redirect::route('checklists.index')->with('message', Lang::get('Salvo com sucesso'));
        }
        return Redirect::route('checklists.create')->withErrors($checklist->errors());
	}

	/**
	 * Remove checklist específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
    {
		Checklist::destroy($id);
		return Redirect::route('checklists.index');
	}

}
