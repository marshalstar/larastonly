<?php

/* Padrão de nome de rotas:
 * rotas do crud de administrador: admin.index, admin.create, admin.store, admin.show, admin.edit, admin.update, admin.destroy
 * rotas do crud de usuário padrao (ele só vẽ o que ele criou, e nao sera no estilo heidsql): index, create, store, show, edit, update, destroy
 *
 * outras rotas devem ter o nome simples, de preferencia.
 *
 * exemplo (trocar senha):
 * Route::get('/password', ['as' => 'users.password.edit', 'uses' => 'UsersController@passwordEdit'])
 * Route::put('/password', ['as' => 'users.password.update', 'uses' => 'UsersController@passwordUpdate'])
 *
 * exemplo (recuperar senha):
 * Route::get('/forgot', ['as' => 'users.forgot', 'uses' => 'UsersController@getForgot'])
 * Route::post('/forgot', ['as' => 'users.forgot', 'uses' => 'UsersController@postForgot'])
 * obs.:apesar de existirem dois métodos diferentes, a rota é a mesma, pois tem a mesma url e o mesmo nome
 *
 * exemplo (index por ajax):
 * Route::get('/index/ajax', ['as' => 'users.index.ajax', 'uses' => 'UsersController@indexAjax'])
 */

Route::match(array('GET', 'POST'), '/debug', function()
{
    echo "show!";
});

Route::get('/debug2', function()
{
    return View::make('debug');
});


Route::pattern('id', '[0-9]+');

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::group(['before' => 'guest'], function()
{
    Route::group(['prefix' => 'users'], function ()
    {
        Route::get('/new', ['as' => 'users.new', 'uses' => 'UsersController@getNew']);

        Route::post('/new', ['as' => 'users.new', 'uses' => 'UsersController@postNew']);

        Route::get('/activate/{code}', ['as' => 'user-activate','uses' => 'UsersController@getActivate']);
    });

    Route::get('/forgot', ['as' => 'forgot', 'uses' => 'UsersController@getForgot']);

    Route::post('/forgot', ['as' => 'forgot', 'uses' => 'UsersController@postForgot']);

    Route::get('/recover/{code}', array('as' => 'recover', 'uses' => 'UsersController@getRecover'));

    Route::get('/login', ['as' => 'users.login', 'uses' => 'UsersController@getLogin']);

    Route::post('/login', ['uses' => 'UsersController@postLogin']);
});

Route::get('/logout', ['as' => 'users.logout', 'uses' => 'UsersController@getLogout']);

Route::group(['prefix' => 'admin', 'before' => 'auth'], function ()
{
    Route::get('/profile', ['as' => 'users.profile', 'uses' => 'UsersController@getProfile']);
});

Route::group(['prefix' => 'checklists'], function ()
{
    Route::get('/new', ['as' => 'checklistNew', 'uses' => 'ChecklistsController@newChecklist']);

    Route::get('/graphics/{id}/{query?}', ['as' => 'checklists.graphics', 'uses' => 'ChecklistsController@graphics']);
});

Route::group(array('before' => 'auth'), function()
{
        
        Route::group(array('before'=>'csrf'), function()
        {
            Route::put('/users/password', ['as' => 'password.update', 'uses' => 'UsersController@passwordUpdate']);

            Route::put('/admin/users/password/{id}', ['as' => 'admin.password.update', 'uses' => 'UsersController@adminPasswordUpdate']);
        });

        Route::get('/users/password', ['as' => 'password.edit', 'uses' => 'UsersController@passwordEdit']);

        Route::get('/admin/users/password/{id}', ['as' => 'admin.password.edit', 'uses' => 'UsersController@adminPasswordEdit']);

        Route::get('users/logout', ['as' => 'logout', 'uses' => 'UsersController@getLogout']);

});
Route::get('/editUser/{id}', ['as' => 'editUser', 'uses' => 'UsersController@getEditUser']);

Route::post('/editUser/{id}',['as' => 'editUser', 'uses' => 'UsersController@postEditUser']);

Route::post('/search', ['as' => 'search', 'uses' =>'Checklist@search']);

Route::get('results/(:all)', ['uses' => 'checklists@results']);

Route::get('/checklist/new', ['as' => 'checklistNew', 'uses' => 'ChecklistsController@newChecklist']);

Route::get('/fb', ['uses' => 'UsersController@loginWithFacebook']);

Route::any('/checklists/nyw/{id?}', ['as' => 'nyw', 'uses' => 'ChecklistsController@nyw']);

//Route::any('/titles/storeAjax', ['as' => 'titles.storeAjax', 'uses' => 'TitlesController@logicStore'])->before('ajax');

//Route::any('/questions/storeAjax', ['as' => 'questions.storeAjax', 'uses' => 'QuestionsController@logicStore'])->before('ajax');

//Route::any('/alternatives/storeAjax', ['as' => 'alternatives.storeAjax', 'uses' => 'AlternativesController@logicStore'])->before('ajax');

//Route::any('/checklists/updateAjax/{id}', ['as' => 'checklists.updateAjax', 'uses' => 'ChecklistsController@logicUpdate'])->before('ajax');

//Route::any('/titles/updateAjax/{id}', ['as' => 'titles.updateAjax', 'uses' => 'TitlesController@logicUpdate'])->before('ajax');

//Route::any('/questions/updateAjax/{id}', ['as' => 'questions.updateAjax', 'uses' => 'QuestionsController@logicUpdate'])->before('ajax');

//Route::any('/alternatives/updateAjax/{id}', ['as' => 'alternatives.updateAjax', 'uses' => 'AlternativesController@logicUpdate'])->before('ajax');

Rounting::eachController(['before'=>'ajax'], ['title', 'question', 'alternative'], function($route, $controller) {
    Route::any("/$route/store/ajax", ["as" => "$route.store.ajax", "uses" => "$controller@storeAjax"]);
});

Rounting::eachController(['before'=>'ajax'], ['checklist', 'title', 'question', 'alternative'], function($route, $controller) {
    Route::any("/$route/update/ajax/{id}", ["as" => "$route.update.ajax", "uses" => "$controller@updateAjax"]);
});

Rounting::eachController(['before'=>'ajax'], ['checklist', 'title', 'question'], function($route, $controller) {
    Route::delete("/$route/destroy/ajax/{id}", ["as" => "$route.destroy.ajax", "uses" => "$controller@destroyAjax"]);
});

$cruds = [
    'alternative',
    'checklist',
    'city',
    'country',
    'evaluation',
    'place',
    'question',
    'state',
    'tag',
    'title',
    'type',
    'user',
];
Rounting::eachController(['prefix' => 'admin'], $cruds, function($route, $controller) {
    Route::get("/$route", ["as" => "admin.$route.index", "uses" => "$controller@adminIndex"]);
    Route::get("/$route/create", ["as" => "admin.$route.create", "uses" => "$controller@adminCreate"]);
    Route::post("/$route", ["as" => "admin.$route.store", "uses" => "$controller@adminStore"]);
    Route::get("/$route/{id}", ["as" => "admin.$route.show", "uses" => "$controller@adminShow"]);
    Route::get("/$route/{id}/edit", ["as" => "admin.$route.edit", "uses" => "$controller@adminEdit"]);
    Route::put("/$route/{id}", ["as" => "admin.$route.update", "uses" => "$controller@adminUpdate"]);
    Route::patch("/$route/{id}", ["as" => "admin.$route.update", "uses" => "$controller@adminUpdate"]);
    Route::delete("/$route/{id}", ["as" => "admin.$route.destroy", "uses" => "$controller@adminDestroy"]);

    Route::any("/$route/index/ajax", ["as" => "admin.$route.index.ajax", "uses" => "$controller@adminIndexAjax"])
        ->before('ajax');
});

Route::any('/checklist/save', ['as' => 'checklistSave', 'uses' => 'ChecklistsController@save']);

Route::any('/checklist/responder/{id}', ['as' => 'checklistResponder', 'uses' => 'ChecklistsController@responder']);

Route::post('/checklist/responder/respondeu', ['as' => 'checklistRespondeu', 'uses' => 'ChecklistsController@respondeu']);