<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Backend\BackendController;
use App\Models\Crud;
use Datatables;

class CrudController extends BackendController
{

    public function __construct()

	{
		$this->model = new Crud;
	   // $this->breadcrumbs = ['index' => ['hello' , 'name' , 'gue' , 'reza']]; // custom breadcrumbs example
    }

    public function getIndex()

    {
        return view('backend.crud.index');
    }

    public function getData()

    {

        $buttons = function($id){
            return html()->buttons($id);
        };

    	$model = $this->model->select('id' , 'name' ,'role' ,  'address');
    	
    	$data = Datatables::of($model)
        
        ->addColumn('opsi' , function($model) use ($buttons){
            
            return $buttons($model->id);
        })
        
        ->make(true);
    	
    	return $data;
    }

    public function getCreate()

    {
        return view('backend.crud.form' , [
            'model' => $this->model,
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
        return view('backend.crud.form' , [
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
                 return redirect(helper()->urlAction().'/index')->withInfo('Data Cannot be deleted');
            }
            
        }else{
            return redirect('404');
        }

    }
}
