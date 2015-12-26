<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Backend\BackendController;
use App\Models\User;
use App\Models\Role;
use Datatables;
class UserController extends BackendController
{

    public $model;
    public $modelRole;

    public function __construct()

    {
        $this->model = new User;
        $this->modelRole = new Role;
        $this->roles = $this->modelRole->lists('role' , 'id')->toArray();
    }

    public function getIndex()

    {
        return view('backend.user.index');
    }

    public function getCreate()

    {
        return view('backend.user.form' , [
            'model' => $this->model,
            'roles' => $this->roles,
        ]);
    }

    public function postCreate(Request $request)

    {
        $values = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'name' => $request->name,
            'role_id' => $request->role_id,
        ];

        $this->model->create($values);

        return redirect(helper()->urlAction().'/index')->withSuccess('Data has been saved');
   
    }

    public function getUpdate($id)

    {
        return view('backend.user.form' , [
            'model' => $this->model->find($id),
            'roles' => $this->roles,
        ]);
    }

    public function postUpdate(Request $request , $id)

    {
        $values = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'name' => $request->name,
            'role_id' => $request->role_id,
        ];

        $this->model->find($id)->update($values);

        return redirect(helper()->urlAction().'/index')->withSuccess('Data has been updated');
   
    }

    public function getData()

    {
        $model = $this->model->select('users.id' , 'username' , 'name' , 'email' , 'role_id' , 'roles.role')
        ->join('roles' , 'roles.id' ,'=' , 'users.role_id' );

         return Datatables::of($model)
            
            ->addColumn('opsi' , function($model){
            
                $deleteButton = html()->buttonDelete($model->id);
                
                $updateButton = html()->buttonUpdate($model->id);

                if($model->id != 1)
                return $updateButton.' '.$deleteButton;
            })

            ->make(true);
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
