<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('login', function(){
    return View::make('login');
});

Route::post('login', function(){
    $userdata = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')
    );

    if(Auth::attempt($userdata))
    {
        return Redirect::to('/');
    } else {
        return Redirect::to('login')
            ->with('login_errors', true);
    }
});

Route::get('logout', function(){
    Auth::logout();
    return Redirect::to('login');
});

Route::get('sprites', function(){
    return View::make('sprites');
});

Route::post('sprites', function(){

});