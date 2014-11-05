<?php

use Illuminate\Support\Facades\Validator;

abstract class AdminBaseController extends Controller {

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

    protected $modelClassName;

    /**
     * @return array
     */
    protected function getLikedAttributes() {
        return \DB::connection()->getSchemaBuilder()->getColumnListing(str_plural($this->modelClassName));
    }

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
    private function getViewAdminBaseName()
    {
        return 'admin.'. str_plural($this->modelClassName);
    }

    /**
     */
    protected function beforeAdminIndex()
    {

    }

    /**
     * @return \Illuminate\View\View
     */
    public function adminIndex()
    {
        $this->beforeAdminIndex();
        return View::make("{$this->getViewAdminBaseName()}.index");
    }

    /**
     * @param $view \Illuminate\View\View
     */
    protected function beforeAdminCreateOrEdit($view)
    {

    }

    /**
     * @param $view \Illuminate\View\View
     */
    protected function beforeAdminCreate($view)
    {

    }

    /**
     * @return \Illuminate\View\View
     */
    public function adminCreate()
    {
        $view = View::make("{$this->getViewAdminBaseName()}.create");
        $this->beforeAdminCreate($view);
        $this->beforeAdminCreateOrEdit($view);
        return $view;
    }

    /**
     * @param $obj \LaravelBook\Ardent\Ardent
     */
    protected function beforeAdminStore($obj)
    {

    }

    /**
     * @return \LaravelBook\Ardent\Ardent
     */
    protected function logicAdminStore()
    {
        $obj = $this->newObj(Input::all());
        $this->beforeAdminStore($obj);
        return $obj;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminStore()
    {
        $obj = $this->logicAdminStore();
        if ($obj->errors()->count()) {
            return Redirect::route("{$this->getViewAdminBaseName()}.create")
                ->withErrors($obj->errors());
        }
        return Redirect::route("{$this->getViewAdminBaseName()}.index")
            ->with('message', Lang::get('Salvo com sucesso'));

    }

    /**
     * @param $view \Illuminate\View\View
     * @param $obj \LaravelBook\Ardent\Ardent
     * @param $id integer
     */
    protected function beforeAdminShow($view, $obj, $id)
    {

    }

    /**
     * @param $id integer
     * @return \Illuminate\View\View
     */
    public function adminShow($id)
    {
        $obj = $this->query()->findOrFail($id);
        $view = View::make("{$this->getViewAdminBaseName()}.show");
        $this->beforeAdminShow($view, $obj, $id);
        return $view->with($this->modelClassName, $obj);
    }

    /**
     * @param $view \Illuminate\View\View
     * @param $obj \LaravelBook\Ardent\Ardent
     */
    protected function beforeAdminEdit($view, $obj)
    {

    }

    /**
     * @param $id integer
     * @return \Illuminate\View\View
     */
    public function adminEdit($id)
    {
        $obj = $this->query()->find($id);
        $view = View::make("{$this->getViewAdminBaseName()}.edit");
        $this->beforeAdminEdit($view, $obj);
        $this->beforeAdminCreateOrEdit($view);
        return $view->with($this->modelClassName, $obj);
    }

    /**
     * @param $obj \LaravelBook\Ardent\Ardent
     * @param $id integer
     */
    protected function beforeAdminUpdate($obj, $id)
    {

    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    protected function logicAdminUpdate($id)
    {
        $obj = $this->query()->find($id);
        $obj->fill(Input::all());
        $this->beforeAdminUpdate($obj, $id);
        if ($obj->updateUniques()) {
            return $obj;
        }
    }

    /**
     * @param $id integer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminUpdate($id)
    {
        if ($obj = $this->logicAdminUpdate($id)) {
            return Redirect::route("{$this->getViewAdminBaseName()}.index")
                ->with('message', Lang::get('Editado com sucesso'));
        }
        return Redirect::route("{$this->getViewAdminBaseName()}.edit")
            ->withErrors($obj->errors());
    }

    /**
     * @param $id integer
     */
    protected function beforeAdminDestroy($id)
    {

    }

    /**
     * @param $id integer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminDestroy($id)
    {
        $this->beforeAdminDestroy($id);
        $this->query()->getQuery()->delete($id);
        return Redirect::route("admin.{$this->getViewAdminBaseName()}.index");
    }

    /**
     * @var array
     */
    private static $validationPagination = [
        'current' => 'required|min:0',
        'rowCount' => 'required|min:0',
    ];

    /**
     * @return array
     */
    public function adminIndexAjax()
    {
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
        if (Input::get('searchPhrase') && count($this->getLikedAttributes())) {
            $query->where(function($query) {
                foreach($this->getLikedAttributes() as $attr) {
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
