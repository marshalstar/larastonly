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
    ];

    protected $modelClassName;

    /**
     * @TODO: descobrir como pegar todos atributos disponíveis de uma model
     * @var array
     */
    protected $likeAttributes = [];

    /**
     * @param $attributes array
     * @return \LaravelBook\Ardent\Ardent
     */
    protected function newObj($attributes)
    {
        $reflection = new ReflectionClass(studly_case($this->modelClassName));
        return $reflection->newInstance($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function query()
    {
        return call_user_func_array(studly_case($this->modelClassName)."::query", []);
    }

    /**
     * @return string
     */
    private function getViewBaseName()
    {
        return str_plural($this->modelClassName);
    }

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
        return View::make("{$this->getViewBaseName()}.index");
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
        $view = View::make("{$this->getViewBaseName()}.create");
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
     * @return \LaravelBook\Ardent\Ardent
     */
    protected function logicStore()
    {
        $obj = $this->newObj(Input::all());
        $this->beforeStore($obj);
        if ($obj->save()) {
            return $obj;
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        if ($obj = $this->logicStore()) {
            return Redirect::route("{$this->getViewBaseName()}.index")
                ->with('message', Lang::get('Salvo com sucesso'));
        }
        return Redirect::route("{$this->getViewBaseName()}.create")
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
        $view = View::make("{$this->getViewBaseName()}.show");
        $this->beforeShow($view, $obj, $id);
        return $view->with($this->modelClassName, $obj);
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
        $view = View::make("{$this->getViewBaseName()}.edit");
        $this->beforeEdit($view, $obj);
        $this->beforeCreateOrEdit($view);
        return $view->with($this->modelClassName, $obj);
    }

    /**
     * @param $obj \LaravelBook\Ardent\Ardent
     * @param $id integer
     */
    protected function beforeUpdate($obj, $id)
    {

    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    protected function logicUpdate($id)
    {
        $obj = $this->query()->find($id);
        $obj->fill(Input::all());
        $this->beforeUpdate($obj, $id);
        if ($obj->updateUniques()) {
            return $obj;
        }
    }

    /**
     * @param $id integer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        if ($obj = $this->logicUpdate($id)) {
            return Redirect::route("{$this->getViewBaseName()}.index")
                ->with('message', Lang::get('Editado com sucesso'));
        }
        return Redirect::route("{$this->getViewBaseName()}.edit")
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
            return Redirect::route("{$this->getViewBaseName()}.index");
        }
    }

    /**
     * @return array
     */
    public function indexAjax()
    {
        /** @TODO: verificar se é por ajax */
        $validator = Validator::make(Input::all(['current', 'rowCount']), self::$validationPagination);
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

        /* @TODO: arrumar isto mais tarde
        $data['rows'] = Cache::remember($this->basePlural.http_build_query($data), .1 , function() use ($query) {
        return $query->get()->all();
        });*/
        $data['rows'] = $query->get()->all();

        return $data;
    }

}
