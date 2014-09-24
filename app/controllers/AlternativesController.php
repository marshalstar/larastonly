<?php

class AlternativesController extends Controller
{

    /**
     * @todo ler aqui: http://culttt.com/2014/02/24/working-pagination-laravel-4/
     * - criar cache da paginação
     * - fazer ela funcionar por ajax
     */
    public function getByPage($page = 1, $limit = 5)
    {
        $results = new stdClass;
        $results->page = $page;
        $results->limit = $limit;
        $results->totalItems = 0;
        $results->items = array();

        $alternatives = Alternative::whereBetween('id', [$limit*($page-1), $limit*$page]);

        $results->totalItems = Alternative::count();
        $results->items = $alternatives->get();

        return $results;
    }

	public function index()
    {
        $page = Input::get('page', 1);
        $data = $this->getByPage($page, 10);
        $alternatives = Paginator::make($data->items->all(), $data->totalItems, 10);
        return View::make('alternatives.index', compact('alternatives'));

        /*$alternatives = Alternative::all();
        return View::make('alternatives.index', compact('alternatives'));/**/
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
