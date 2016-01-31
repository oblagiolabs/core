<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('401' , 'Backend\ErrorController@get401');

Route::get('404' , 'Backend\ErrorController@get404');

include __DIR__.'/OblagioRoute.php';
