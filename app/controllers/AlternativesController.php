<?php

class AlternativesController extends Controller
{

    /**
     * @todo ler aqui: http://culttt.com/2014/02/24/working-pagination-laravel-4/
     * - fazer cache
     * - fazer usar o mesmo método do index() (mas só responder deste jeito a requisições ajax)
     */
    public function indexAjax()
    {
        /** @TODO validar valores */

        $data = [];
        ($data['current'] = Input::get('current')) || $data['current'] = 1;
        ($data['rowCount'] = Input::get('rowCount')) || $data['rowCount'] = 10;

        $query = Alternative::query();
        if (Input::get('sort')) {
            $sort = key(Input::get('sort'));
            $query->orderBy($sort, Input::get('sort')[$sort]);
        }
        if ($searchPhrase = Input::get('searchPhrase')) {
            $query->where('name', 'like', "%$searchPhrase%");
        }
        $data['total'] = $query->getQuery()->count('id');

        $query->take($data['rowCount'])->skip($data['rowCount']*($data['current']-1));
        $data['rows'] = $query->get()->all();

        return $data;
    }

	public function index()
    {
        return View::make('alternatives.index');
	}

	public function create()
    {
        $types = array_column(Type::all()->toArray(), 'name', 'id');
	    return View::make('alternatives.create')
            ->with('types', $types);
	}

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

	public function show($id)
    {
		$alternative = Alternative::findOrFail($id);
		return View::make('alternatives.show', compact('alternative'));
	}

	public function edit($id)
    {
		$alternative = Alternative::find($id);
        $types = array_column(Type::all()->toArray(), 'name', 'id');
		return View::make('alternatives.edit')
            ->with('alternative', $alternative)
            ->with('types', $types);
	}

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

	public function destroy($id)
    {
		Alternative::destroy($id);
		return Redirect::route('alternatives.index');
	}

}
