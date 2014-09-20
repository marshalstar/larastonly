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

###

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index',
]);

Route::get('/users/activate/{code}', [
    'as' => 'user-activate',
    'uses' => 'UsersController@getActivate',
]);

Route::get('/users/login', [
    'as' => 'user-login',
    'uses' => 'UsersController@getLogin'
]);

Route::post('/users/login', [
    'as' => 'user-login',
    'uses' => 'UsersController@postLogin'
]);

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