<?php namespace ;

use Illuminate\Routing\Controller;
use Redirect, Request;

class TagsController extends Controller {

	/**
	 * Lista tags
	 *
	 * @return Response
	 */
	public function index() {
		$tags = Tag::all();
		return view('tags.index', compact('tags'));
	}

	/**
	 * Mostra formulário de cadastro espefíco de tag
	 *
	 * @return Response
	 */
	public function create() {
		return view('tags.create');
	}

	/**
	 * Salva tag espefíco no banco
	 *
	 * @return Response
	 */
	public function store() {
		Tag::create(Request::get());
		return Redirect::route('tags.index');
	}

	/**
	 * Mostra tag específico.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$tag = Tag::findOrFail($id);
		return view('tags.show', compact('tag'));
	}

	/**
	 * Mostra formulário de edição espefícico de tag.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$tag = Tag::find($id);
		return view('tags.edit', compact('tag'));
	}

	/**
	 * Atualiza tag específico no banco
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$tag = Tag::findOrFail($id);
		$tag->update(Request::get());
		return Redirect::route('tags.index');
	}

	/**
	 * Remove tag específico do banco.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Tag::destroy($id);
		return Redirect::route('tags.index');
	}

}
