<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Input;
class AjaxController extends Controller
{
	public function __construct()

	{
		$this->user = new User;
	}

    public function forgotPassword()

    {
    	$email = Input::get('email');
    	$cekEmail = $this->user->whereEmail($email);
    	
    	if(empty($cekEmail->first()->id))
    	{
    		$result = 'not_found';
    	}else{

    		$password = 'oblagio'.date("Ymdhi");

    		$newPassword = \Hash::make($password);
			
			$update = $cekEmail->update([
    			'password' => $newPassword,
    		]);

    		\Mail::send('backend.emails.forgot', ['password' => $password , 'user' => $cekEmail->first()], function ($m) use ($email) {
	            $m->from('oblagiotesting@gmail.com');

	            $m->to($email)->subject('Forgot Password');
	        });


    		$result = 'true';
    	}

    	return \Response::json([
    		'result' => $result,
    	]);
    }
}
