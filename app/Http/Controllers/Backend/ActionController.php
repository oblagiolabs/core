<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Backend\BackendController;
use Datatables;
use App\Models\Action;
class ActionController extends BackendController
{
	public function __construct()

	{
		$this->model = new Action;
	}

    public function getIndex()

    {
    	return view('backend.action.index');
    }

    public function getData()
    
    {
    	$model = $this->model->select('id' , 'label' , 'action');

    	return Datatables::of($model)
    	
    	->addColumn('opsi' , function($model){
            
            $deleteButton = html()->buttonDelete($model->id);
            
            $updateButton = html()->buttonUpdate($model->id);

            return $updateButton.' '.$deleteButton;
        })
    	
    	->make(true);
    }

    public function getCreate()

    {
    	return view('backend.action.form' , [
    		'model' => $this->model
    	]);
    }

    public function postCreate(Request $request)

    {
    	$inputs = $request->all();

    	$save = $this->model->create($inputs);

    	return redirect(helper()->urlAction().'/index')->withSuccess('Data has been saved');
 
    }

    public function getUpdate($id)

    {
        return view('backend.action.form' , [
            'model' => $this->model->find($id),
        ]);
    }

    public function postUpdate(Request $request , $id)
    
    {
        $inputs = $request->all();

        $save = $this->model->find($id)->update($inputs);

        return redirect(helper()->urlAction().'/index')->withSuccess('Data has been updated');
    }

    public function getDelete($id)

    {

        $model = $this->model->find($id);

        if(!empty($model->id))
        {
        	try
        	{
        		$model->delete();
	            
	            return redirect(helper()->urlAction().'/index')->withSuccess('Data has been deleted');
  	
        	}catch(\Exception $e){
        		 return redirect(helper()->urlAction().'/index')->withSuccess('Data Cannot be deleted');
        	}
            
        }else{
            return redirect('404');
        }

    }
}
