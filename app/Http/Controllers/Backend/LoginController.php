<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
class LoginController extends Controller
{
    public function getIndex()

    {
    	return view('backend.login');
    }

    public function postIndex(Request $request)

    {
		
		if(Auth::attempt(['username' => $request->username ,'password' => $request->password]))
    	{
    		return redirect(helper()->urlBackend('/'));
    	}else{
    		
    		return redirect()->back()->withInput()->withError('Login Failed , Check Your Password or Username');
    
    	}

    }

    public function getLogout()

    {
    	Auth::logout();

    	return redirect(url('login'));
    }
}
