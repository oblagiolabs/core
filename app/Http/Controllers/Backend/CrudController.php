<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Backend\BackendController; 
use App\Models\Crud;
use Datatables;

class CrudController extends BackendController
{
    /*
        |--------------------------------------------------------------------------
        | Keterangan
        |--------------------------------------------------------------------------
        |
        | Contoh membuat Controller 
        | Jika di default Laravel 5 controller mengextends Class Controller maka disini aturanya mengexteds BackendController
        | Tapi Tidak tidak masalah jika mengexteds Class Controller langsung , hanya ada beberapa fitur yang tidak bisa dipakai
        |
    */

    public function __construct()

	{
		$this->model = new Crud;
	   // $this->breadcrumbs = ['index' => ['hello' , 'name' , 'gue' , 'reza']]; // controh pembuatan breadcrumbs manual
    }

    public function getIndex() // method index -> tampilan awal

    {
        return view('backend.crud.index'); // render view 
    }

    public function getData() 
    // method data -> untuk mengambil data dari database dan ditampilkan di datatables yang ada di view yang ada di method index
    {

        $buttons = function($id){ // anonymous function untuk menampilkan buttons
            return html()->buttons($id); // helper buttons oblagio
        };

        // untuk script di bawah silahkan baca dokumentasi packages yajra datatables;

    	$model = $this->model->select('id' , 'name' ,'role' ,  'address');
    	
    	$data = Datatables::of($model)
        
        ->addColumn('opsi' , function($model) use ($buttons){
            
            return $buttons($model->id);
        })
        
        ->make(true);
    	
    	return $data;
        //
    }

    // untuk method dibawah silahkan baca dokumentasi laravel 5

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
