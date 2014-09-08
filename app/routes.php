<?php

Route::get('/', function()
{
//	return View::make('hello');

    $user = new User;
    $user->username = 'nome';
    $user->email = 'email2@email.com';
    $user->password = 'password';
    $user->password_confirmation = 'password';
    $user->speciality = 'especialidade';
    $user->gender = 'm';
    $user->gender = 'm';
    Kint::dump([$user]);
    $user->save();
    Kint::dump($user->errors());
    Kint::dump([$user, $user->id]);

    Kint::dump(User::all());

    die;

});

Route::resource('alternatives', 'AlternativesController');
Route::resource('checklists', 'ChecklistsController');
Route::resource('evaluations', 'EvaluationsController');
Route::resource('questions', 'QuestionsController');
Route::resource('tags', 'TagsController');
Route::resource('titles', 'TitlesController');
Route::resource('types', 'TypesController');
Route::resource('users', 'UsersController');
