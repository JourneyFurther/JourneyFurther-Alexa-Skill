<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* There is no web user-accessible front end to the alexa app, everything goes through the api route instead,
   ive just left the welcome view for the route / so it's got something to return if some web crawler hit it.
*/

Route::get('/', function () {
    return view('welcome');
});

