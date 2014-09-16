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


Route::resource('alternatives', 'AlternativesController');
Route::resource('checklists', 'ChecklistsController');
Route::resource('evaluations', 'EvaluationsController');
Route::resource('questions', 'QuestionsController');
Route::resource('tags', 'TagsController');
Route::resource('titles', 'TitlesController');
Route::resource('types', 'TypesController');
Route::resource('users', 'UsersController');

Route::group(array('before' => 'guest'), function(){
	Route::group(array('before' => 'csrf'), function(){
		Route::post('/users/create', array(
			'as' => 'users-create-post',
			'uses' => 'UsersController@postCreate'
			));
	});

	Route::get('users/create', array(
			'as' => 'users-create',
			'uses' => 'UsersController@getCreate'

		));

	Route::get('/users/activate/{code}', array(
		'as' => 'users-activate',
		'uses' => 'UsersController@getActivate'

		));
});