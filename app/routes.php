<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index',
]);

Route::match(array('GET', 'POST'), '/debug', function()
{
	dd(Input::all());
    return 'Hello World';
});

Route::get('/debug2', function()
{
    return View::make('debug');
});

Route::get('/montar-lista', []);

Route::get('/users/active/{code}', [
    'as' => 'user-active',
    'uses' => 'UsersController@getActivate',
]);

Route::get('/users/login', 
	[
	'as' => 'users-login',
	'uses' => 'UsersController@getLogin'

	]);
Route::post('/users/login', 
	[
	'as' => 'users-login-post',
	'uses' => 'UsersController@postLogin'
	]);

Route::resource('alternatives', 'AlternativesController');
Route::resource('checklists', 'ChecklistsController');
Route::resource('evaluations', 'EvaluationsController');
Route::resource('questions', 'QuestionsController');
Route::resource('tags', 'TagsController');
Route::resource('titles', 'TitlesController');
Route::resource('types', 'TypesController');
Route::resource('users', 'UsersController');

