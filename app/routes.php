<?php

Route::match(array('GET', 'POST'), '/debug', function()
{
	dd(Input::all());
    return 'Hello World';
});

Route::get('/debug2', function()
{
    return View::make('debug');
});

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index',
]);

Route::group(['before' => 'guest'], function()
{
    Route::group(['prefix' => 'users'], function ()
    {
        Route::get('/new', [
            'as' => 'users.new',
            'uses' => 'UsersController@getNew'
        ]);

        Route::post('/new', [
            'as' => 'users.new',
            'uses' => 'UsersController@postNew'
        ]);

        Route::get('/activate/{code}', [
            'as' => 'user-activate',
            'uses' => 'UsersController@getActivate',
        ]);
    });

    Route::get('/login', [
        'as' => 'users.login',
        'uses' => 'UsersController@getLogin'
    ]);

    Route::post('/login', [
        'uses' => 'UsersController@postLogin'
    ]);
});

Route::get('/logout', [
    'as' => 'users.logout',
    'uses' => 'UsersController@getLogout'
]);

/*
 * É aqui GUILHERME GORGES Guilherme Gorges que você vai obrigar o josney a se logar
 * exemplo: http://localhost:8000/admin/profile
 */
Route::group(['prefix' => 'admin', 'before' => 'auth'], function ()
{
    Route::get('/profile', [
        'as' => 'users.profile',
        'uses' => 'UsersController@getProfile'
    ]);
});

Route::get('/checklist/new', [
    'as' => 'checklistNew',
    'uses' => 'ChecklistsController@newChecklist',
]);

Route::resource('alternatives', 'AlternativesController');
Route::resource('checklists', 'ChecklistsController');
Route::resource('evaluations', 'EvaluationsController');
Route::resource('questions', 'QuestionsController');
Route::resource('tags', 'TagsController');
Route::resource('titles', 'TitlesController');
Route::resource('types', 'TypesController');
Route::resource('users', 'UsersController');