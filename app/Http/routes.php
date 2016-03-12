<?php


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::group(['prefix' => 'admin'], function () {
    	Route::resource('/user', 'UserController');
    	Route::resource('/year', 'YearController');
        Route::resource('/semester', 'SemesterController');
        Route::resource('/subject', 'SubjectController');
        
        Route::get('/post', 'PostController@index');

        Route::get('/post/ajax-submenu', 'PostController@subMenu');
        Route::get('/post/ajax-submenu2', 'PostController@subMenu2');

        Route::get('/post/delete/{filename}', [
            'as' => 'deleteentry', 'uses' => 'PostController@delete']);
        Route::get('/post/get/{filename}', [
            'as' => 'getentry', 'uses' => 'PostController@get']);
        Route::post('/post/add',[ 
                'as' => 'addentry', 'uses' => 'PostController@add']);
        Route::get('/post/edit/{id}',[
            'as' => 'editentry', 'uses' => 'PostController@edit'
            ]);
        Route::put('/post/update/{id}',[
            'as' => 'updateentry', 'uses' => 'PostController@update'
            ]);
    });
    Route::group(['prefix' => 'teacher'], function () {
    	Route::resource('/post', 'PostController');
    });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
