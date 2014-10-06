<?php

use Illuminate\Support\Facades\Validator;

abstract class BaseController extends Controller {

//	/**
//	 * Setup the layout used by the controller.
//	 *
//	 * @return void
//	 */
//	protected function setupLayout()
//	{
//		if ( ! is_null($this->layout))
//		{
//			$this->layout = View::make($this->layout);
//		}
//	}

    /**
     * @var array
     */
    public static $validationPagination = [
        'current' => 'required|min:0',
        'rowCount' => 'required|min:0',
        'sort' => 'alpha',
        'searchPhrase' => '',
    ];

    /**
     * @var string
     */
    protected $baseSingular;

    /**
     * @var string
     */
    protected $basePlural;

    /**
     * @TODO: descobrir como pegar todos atributos disponíveis de uma model
     * @var array
     */
    protected $likeAttributes = [];

    /**
     * @return \LaravelBook\Ardent\Ardent
     */
    protected abstract function newObj();

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected abstract function query();

    /**
     */
    protected function beforeIndex()
    {

    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->beforeIndex();
        return View::make("{$this->basePlural}.index");
    }

    /**
     * @return array
     */
    public function indexAjax()
    {
        $validator = Validator::make(Input::all(), self::$validationPagination);
        if ($validator->fails()) {
            App::abort(404);
        }

        $data = [];
        ($data['current'] = Input::get('current')) || $data['current'] = 1;
        ($data['rowCount'] = Input::get('rowCount')) || $data['rowCount'] = 10;

        $query = $this->query();
        if (Input::get('sort')) {
            $sort = key(Input::get('sort'));
            $query->orderBy($sort, Input::get('sort')[$sort]);
        }
        if (Input::get('searchPhrase') && count($this->likeAttributes)) {
            $query->where(function($query) {
                foreach($this->likeAttributes as $attr) {
                    $query->orWhere($attr, 'like', '%'.Input::get('searchPhrase').'%');
                }
                return $query;
            });
        }
        $data['total'] = $query->count('id');

        $query->take($data['rowCount'])->skip($data['rowCount']*($data['current']-1));
        $data['rows'] = Cache::remember($this->basePlural.'_page_'.implode($data), 5, function() use ($query) {
            return $query->get()->all();
        });

        return $data;
    }

    /**
     * @param $view \Illuminate\View\View
     */
    protected function beforeCreateOrEdit($view)
    {

    }

    /**
     * @param $view \Illuminate\View\View
     */
    protected function beforeCreate($view)
    {

    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $view = View::make("{$this->basePlural}.create");
        $this->beforeCreate($view);
        $this->beforeCreateOrEdit($view);
        return $view;
    }

    /**
     * @param $obj \LaravelBook\Ardent\Ardent
     */
    protected function beforeStore($obj)
    {

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $obj = $this->newObj();
        $this->beforeStore($obj);
        if ($obj->save()) {
            return Redirect::route("{$this->basePlural}.index")
                ->with('message', Lang::get('Salvo com sucesso'));
        }
        return Redirect::route("{$this->basePlural}.create")
            ->withErrors($obj->errors());
    }

    /**
     * @param $view \Illuminate\View\View
     * @param $obj \LaravelBook\Ardent\Ardent
     * @param $id integer
     */
    protected function beforeShow($view, $obj, $id)
    {

    }

    /**
     * @param $id integer
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $obj = $this->query()->findOrFail($id);
        $view = View::make("{$this->basePlural}.show");
        $this->beforeShow($view, $obj, $id);
        return $view->with($this->baseSingular, $obj);
    }

    /**
     * @param $view \Illuminate\View\View
     * @param $obj \LaravelBook\Ardent\Ardent
     */
    protected function beforeEdit($view, $obj)
    {

    }

    /**
     * @param $id integer
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $obj = $this->query()->find($id);
        $view = View::make("{$this->basePlural}.edit");
        $this->beforeEdit($view, $obj);
        $this->beforeCreateOrEdit($view);
        return $view->with($this->baseSingular, $obj);
    }

    /**
     * @param $obj \LaravelBook\Ardent\Ardent
     * @param $id integer
     */
    protected function beforeUpdate($obj, $id)
    {

    }

    /**
     * @param $id integer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $obj = $this->query()->find($id);
        $obj->fill(Input::all());
        $this->beforeUpdate($obj, $id);
        if ($obj->updateUniques()) {
            return Redirect::route("{$this->basePlural}.index")
                ->with('message', Lang::get('Editado com sucesso'));
        }
        return Redirect::route("{$this->basePlural}.edit")
            ->withErrors($obj->errors());
    }

    /**
     * @param $id integer
     */
    protected function beforeDestroy($id)
    {

    }

    /**
     * @param $id integer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->beforeDestroy($id);
        $this->query()->getQuery()->delete($id);
        if (!Request::ajax()) {
            return Redirect::route("{$this->basePlural}.index");
        }
    }

}
