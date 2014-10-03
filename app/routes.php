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
Route::get('/users/login/fb', function(){
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'redirect_uri' => url('/users/login/fb/callback'),
        'scope' => 'email',
        );
    return Redirect::to($facebook->getLoginUrl($params));
});

Route::get('/users/login/fb/callback', function(){
    $code = Input::get('code');
    if(strlen($code) == 0) return Redirect::to('/')->with('message', 'Erro');
    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();
    if($uid==0) return Redirect::to('home')->with('message', 'Erro');
    $me = $facebook->api('/me');
    
    $profile = Profile::whereUid($uid)->first();

    if(empty($profile))
    {
        $user = new User;
        $user->username = $me['first_name'].' '.$me['last_name'];
        $user->email = $me['email'];
        $user->gender = $me['gender'];

        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        $profile->username = $me['id'];
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;
    Auth::login($user);
    return Redirect::to('home')->with('message','Logou');
});
Route::get('facebook', function(){
    $data = array();
    if(Auth::check())
    {
        $data = Auth::user();
    }
    return View::make('home.index', array('data' => $data));
});

Route::get('logou', function() {
    Auth::logout();
    return Redirect::to('home');
});
Route::resource('alternatives', 'AlternativesController');
Route::resource('checklists', 'ChecklistsController');
Route::resource('evaluations', 'EvaluationsController');
Route::resource('questions', 'QuestionsController');
Route::resource('tags', 'TagsController');
Route::resource('titles', 'TitlesController');
Route::resource('types', 'TypesController');
Route::resource('users', 'UsersController');


Route::post('/checklist/save', [
 'as' => 'checklistSave',
 'uses' => 'ChecklistsController@save',
]);
