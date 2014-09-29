<?php namespace ;

use Illuminate\Routing\Controller;
use Redirect, Request;

class CountriesController extends Controller {

	/**
	 * Lista countries
	 *
	 * @return Response
	 */
	public function index() {
		$countries = Country::all();
		return view('countries.index', compact('countries'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de country
	 *
	 * @return Response
	 */
	public function create() {
		return view('countries.create');
	}

	/**
	 * Salva country espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
		Country::create(Request::get());
		return Redirect::route('countries.index');
	}

	/**
	 * Mostra country específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$country = Country::findOrFail($id);
		return view('countries.show', compact('country'));
	}

	/**
	 * Mostra formulário de edição espefícico de country.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$country = Country::find($id);
		return view('countries.edit', compact('country'));
	}

	/**
	 * Atualiza country específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$country = Country::findOrFail($id);
		$country->update(Request::get());
		return Redirect::route('countries.index');
	}

	/**
	 * Remove country específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Country::destroy($id);
		return Redirect::route('countries.index');
	}

}
