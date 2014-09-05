<?php namespace ;

use Illuminate\Routing\Controller;
use Redirect, Request;

class ChecklistsController extends Controller {

	/**
	 * Lista checklists
	 *
	 * @return Response
	 */
	public function index() {
		$checklists = Checklist::all();
		return view('checklists.index', compact('checklists'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de checklist
	 *
	 * @return Response
	 */
	public function create() {
		return view('checklists.create');
	}

	/**
	 * Salva checklist espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
		Checklist::create(Request::get());
		return Redirect::route('checklists.index');
	}

	/**
	 * Mostra checklist específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$checklist = Checklist::findOrFail($id);
		return view('checklists.show', compact('checklist'));
	}

	/**
	 * Mostra formulário de edição espefícico de checklist.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$checklist = Checklist::find($id);
		return view('checklists.edit', compact('checklist'));
	}

	/**
	 * Atualiza checklist específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$checklist = Checklist::findOrFail($id);
		$checklist->update(Request::get());
		return Redirect::route('checklists.index');
	}

	/**
	 * Remove checklist específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Checklist::destroy($id);
		return Redirect::route('checklists.index');
	}

}
