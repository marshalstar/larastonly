<?php namespace ;

use Illuminate\Routing\Controller;
use Redirect, Request;

class PlacesController extends Controller {

	/**
	 * Lista places
	 *
	 * @return Response
	 */
	public function index() {
		$places = Place::all();
		return view('places.index', compact('places'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de place
	 *
	 * @return Response
	 */
	public function create() {
		return view('places.create');
	}

	/**
	 * Salva place espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
		Place::create(Request::get());
		return Redirect::route('places.index');
	}

	/**
	 * Mostra place específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$place = Place::findOrFail($id);
		return view('places.show', compact('place'));
	}

	/**
	 * Mostra formulário de edição espefícico de place.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$place = Place::find($id);
		return view('places.edit', compact('place'));
	}

	/**
	 * Atualiza place específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$place = Place::findOrFail($id);
		$place->update(Request::get());
		return Redirect::route('places.index');
	}

	/**
	 * Remove place específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Place::destroy($id);
		return Redirect::route('places.index');
	}

}
