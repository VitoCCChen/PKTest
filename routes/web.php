<?php

Route::get('/', function () {
    return view('home.index');
});

Route::get('/live', 'liveController@index');

Route::get('/live_ins/{id}', 'liveInsController@index');
