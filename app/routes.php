<?php

Route::match(array('GET', 'POST'), '/debug', function()
{
	$checklist = new Checklist;
    $checklist->name = "name";
    $checklist->save();
    echo "show!";
});

Route::get('/debug2', function()
{
    return View::make('debug');
});


Route::pattern('id', '[0-9]+');

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

    Route::get('/forgot', [
        'as' => 'forgot',
        'uses' => 'UsersController@getForgotPassword'
        ]);

     Route::post('/forgot', 
        [
        'as' => 'forgot',
        'uses' => 'UsersController@postForgotPassword'
        ]);

     Route::get('/recover/{code}', array(
        'as' => 'recover',
        'uses' => 'UsersController@getRecover'
        ));


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

Route::group(['prefix' => 'admin', 'before' => 'auth'], function ()
{
    Route::get('/profile', [
        'as' => 'users.profile',
        'uses' => 'UsersController@getProfile'
    ]);
});

Route::group(['prefix' => 'checklists'], function ()
{
    Route::get('/new', [
        'as' => 'checklistNew',
        'uses' => 'ChecklistsController@newChecklist',
    ]);

    Route::get('/graphics/{id}/{query?}', [
        'as' => 'checklists.graphics',
        'uses' => 'ChecklistsController@getGraphics',
    ]);
});
Route::group(array('before' => 'auth'), function(){
        
        Route::group(array('before'=>'csrf'), function(){
            Route::post('/users/changepassword', array(
                'as' => 'change-password-post',
                'uses' => 'UsersController@postChangePassword'
                ));
        });

        /* Mudar a senha */
        Route::get('/users/changepassword', array(
            'as' => 'changepassword',
            'uses' => 'UsersController@getChangePassword'
            ));

    /*Sair */
    Route::get('users/logout', array(
'as' => 'logout',
'uses' => 'UsersController@getLogout'
        ));

});

Route::get('/checklist/new', [
 'as' => 'checklistNew',
 'uses' => 'ChecklistsController@newChecklist',
]);

Route::any('/alternatives/indexAjax', [
 'uses' => 'AlternativesController@indexAjax',
]);

Route::any('/checklists/indexAjax', [
 'uses' => 'ChecklistsController@indexAjax',
]);

Route::any('/evaluations/indexAjax', [
 'uses' => 'EvaluationsController@indexAjax',
]);

Route::any('/questions/indexAjax', [
 'uses' => 'QuestionsController@indexAjax',
]);

Route::any('/tags/indexAjax', [
 'uses' => 'TagsController@indexAjax',
]);

Route::any('/titles/indexAjax', [
 'uses' => 'TitlesController@indexAjax',
]);

Route::any('/types/indexAjax', [
 'uses' => 'TypesController@indexAjax',
]);

Route::any('/users/indexAjax', [
 'uses' => 'UsersController@indexAjax',
]);

Route::any('/countries/indexAjax', [
 'uses' => 'CountriesController@indexAjax',
]);

Route::any('/states/indexAjax', [
 'uses' => 'StatesController@indexAjax',
]);

Route::any('/cities/indexAjax', [
 'uses' => 'CitiesController@indexAjax',
]);

Route::any('/places/indexAjax', [
 'uses' => 'PlacesController@indexAjax',
]);

Route::get('/fb', [
'uses' => 'UsersController@loginWithFacebook',
]);

Route::any('/checklists/nyw', [
    'as' => 'nyw',
    'uses' => 'ChecklistsController@nyw',
]);

Route::resource('alternatives', 'AlternativesController');
Route::resource('checklists', 'ChecklistsController');
Route::resource('evaluations', 'EvaluationsController');
Route::resource('questions', 'QuestionsController');
Route::resource('tags', 'TagsController');
Route::resource('titles', 'TitlesController');
Route::resource('types', 'TypesController');
Route::resource('users', 'UsersController');
Route::resource('countries', 'CountriesController');
Route::resource('states', 'StatesController');
Route::resource('cities', 'CitiesController');
Route::resource('places', 'PlacesController');


Route::any('/checklist/save', [
 'as' => 'checklistSave',
 'uses' => 'ChecklistsController@save',
]);

Route::any('/checklist/responder/{id}', [
 'as' => 'checklistResponder',
 'uses' => 'ChecklistsController@responder',
]);