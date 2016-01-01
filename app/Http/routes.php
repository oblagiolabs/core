<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('401' , 'Backend\ErrorController@get401');

Route::get('404' , 'Backend\ErrorController@get404');

// start backend routes
Route::get('form-validation' , 'Backend\BackendController@getFormvalidation');
Route::get('oblagio-table' , 'Backend\BackendController@getOblagiotable');
	
Route::get('forgot-password' , 'Backend\AjaxController@forgotPassword');
Route::controller('login' , 'Backend\LoginController');
Route::group(['prefix' => oblagioSetting()['backendName'] , 'middleware' => ['auth' , 'right']] ,  function(){
	
	Route::get('/','Backend\DefaultController@getIndex');
	
	Route::get('media-library-core' , 'Backend\BackendController@mediaLibrary');
 	
	Route::get('popup-elfinder' , 'Backend\BackendController@popupElfinder');
 

	foreach(helper()->injectModel('Menu')->where('controller' , '!=' , '#')->get() as $row)

	{
		Route::controller($row->permalink , $row->controller);
	}

});

// end backend routes
