<?php

/**
 * CORE OBLAGIO ROUTES HERE!!
 */

Route::get('form-validation' , 'Backend\BackendController@getFormvalidation');
Route::get('oblagio-table' , 'Backend\BackendController@getOblagiotable');
	
Route::get('forgot-password' , 'Backend\AjaxController@forgotPassword');
Route::controller('login' , 'Backend\LoginController');

Route::group(['prefix' => config('config.backendName') , 'middleware' => ['auth' , 'right']] ,  function(){
	
	Route::get('/','Backend\DefaultController@getIndex');
	
	Route::get('media-library-core' , 'Backend\BackendController@mediaLibrary');
 	
	Route::get('popup-elfinder' , 'Backend\BackendController@popupElfinder');
 

	foreach(helper()->injectModel('Menu')->where('controller' , '!=' , '#')->get() as $row)

	{
		Route::controller($row->permalink , $row->controller);
	}

});

