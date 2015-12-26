<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Backend\BackendController;

class ErrorController extends BackendController
{
    public function __construct()

	{
		$this->breadcrumbs = ['index' => ['hello' , 'name' , 'gue' , 'reza']]; // custom breadcrumbs example
    
    }

    public function get401()

    {
    	$message = 'WHOOPS You Cannot Open This Page , you dont have authorize !';
        return view('backend.not_found' , compact('message'));
    }

    public function get404()

    {
    	$message = 'Page Not Found';
        return view('backend.not_found' , compact('message'));
    }
}
