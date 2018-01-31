<?php

Route::get('/', function () {
    return view('home.index');
});

Route::get('/live', 'liveController@index')->name('live');

Route::get('/live_ins/{id}', 'liveInsController@index')->name('live_ins');
