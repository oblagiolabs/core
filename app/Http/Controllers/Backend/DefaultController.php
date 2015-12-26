<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Backend\BackendController;

class DefaultController extends BackendController
{
	public function __construct()

	{
		$this->breadcrumbs = ['index' => ['hello' , 'name' , 'gue' , 'reza']]; // custom breadcrumbs example
    }

    public function getIndex()

    {
        return view('backend.default.index');
    }
}
