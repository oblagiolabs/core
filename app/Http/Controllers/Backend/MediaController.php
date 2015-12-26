<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Backend\BackendController;

class MediaController extends BackendController
{
    public function getIndex()

    {
    	return view('backend.media.index');
    }
}
