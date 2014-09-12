<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index',
]);

Route::get('/debug', function()
{
    Kint::dump(array_column(Alternative::all()->toArray(), 'name', 'id'));
    Kint::dump(Alternative::all(['id', 'name'])->toArray());
    die('show');
});

Route::resource('alternatives', 'AlternativesController');
Route::resource('checklists', 'ChecklistsController');
Route::resource('evaluations', 'EvaluationsController');
Route::resource('questions', 'QuestionsController');
Route::resource('tags', 'TagsController');
Route::resource('titles', 'TitlesController');
Route::resource('types', 'TypesController');
Route::resource('users', 'UsersController');
