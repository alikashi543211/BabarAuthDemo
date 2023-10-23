<?php

Route::post('/login', 'Insyghts\Authentication\Controllers\UserController@login');
Route::post('/add/user', 'Insyghts\Authentication\Controllers\UserController@addUser');


Route::group([

    'prefix' => 'api'

], function ($router) {
    Route::get('/refresh/token', 'Insyghts\Authentication\Controllers\UserController@refresh');
    Route::post('/contact/create', 'Insyghts\Authentication\Controllers\ContactController@store');
    Route::get('/contacts', 'Insyghts\Authentication\Controllers\ContactController@contacts');
    Route::put('/contact/update/{id}', 'Insyghts\Authentication\Controllers\ContactController@update');
    Route::delete('/contact/delete/{id}', 'Insyghts\Authentication\Controllers\ContactController@delete');

});
