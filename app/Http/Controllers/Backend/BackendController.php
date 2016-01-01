<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Datatables;
class BackendController extends Controller
{
	
	public $breadcrumbs = [];
	
	public function getFormvalidation()

	{
		$inputs = Input::all();
		
		$model = $inputs['model'];
		
		$unique_id = $inputs['unique_id'];

		unset($inputs['model']);
		unset($inputs['unique_id']);
		
		$modelFix = helper()->injectModel($model);

		if(!$modelFix->messages)
		{
			$messages = [];
		}else{
			$messages = $modelFix->messages;
		}

		$validation = Validator::make($inputs , $modelFix->rules($unique_id) , $messages);

		if($validation->fails())
		{
			$status = 'fails';
			$errors = $validation->getMessageBag()->toArray();
		}else{
			$status = 'true';
			$errors = '';
		}

		return \Response::json([
			'status' => $status , 
			'errors' => $errors
		]);
	}	

	public function mediaLibrary()

	{
		return view('backend.elfinders.media_library');
	}

	public function popupElfinder()

	{
		return view('backend.elfinders.elfinder');
	}
	
}
