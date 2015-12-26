<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Backend\BackendController;
use App\Models\Role;
use App\Models\Menu;
use App\Models\MenuAction;
use Datatables;
use Input;
use App\Models\Right;
use DB;

class RoleController extends BackendController
{
    public $model;
    public $menu;
    public $right;

    public function __construct()

    {
        $this->model = new Role;
        $this->menu = new Menu;
        $this->menuAction = new MenuAction;
        $this->right = new Right;
    }

    public function getIndex()

    {
        return view('backend.role.index');
    }

    public function getData()

    {
        $model = $this->model->select('id' , 'role');

        return Datatables::of($model)
            
            ->addColumn('opsi' , function($model){
            
                $deleteButton = html()->buttonDelete($model->id);
                
                $updateButton = html()->buttonUpdate($model->id);

                $viewButton = html()->buttonView($model->id); 

                if($model->id != 1)
                 return $updateButton.' '.$viewButton.' '.$deleteButton;
            })

            ->make(true);
    }

    public function getCreate()

    {
        $model = $this->model;

        return view('backend.role.form' , compact('model'));
    }

    public function postCreate(Request $request)

    {
        $save = $this->model->create($request->all());

        return redirect(helper()->urlAction().'/index')->withSuccess('Data has been saved');
   
    }

    public function getUpdate($id)

    {
        $model = $this->model->find($id);

        return view('backend.role.form' , compact('model'));
    }

    public function postUpdate(Request $request , $id)

    {
        $save = $this->model->find($id)->update($request->all());

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

    public function getView($id)

    {
        $model = $this->model->find($id);
        
        $menu = $this->menu;
        
        $menuAction = $this->menuAction;
        
        $right = $this->right;

        $cek = function($menu_action_id) use ($right , $id){
            $cekRight = $right->whereRoleId($id)->whereMenuActionId($menu_action_id)->first();
            if(!empty($cekRight->id))
            {
                return 'checked';
            }else{
                return '';
            }
        };

        return view('backend.role.view' , [
            'model' => $model,
            'menu' => $menu,
            'menuAction' => $menuAction,
            'cek' => $cek
        ]);
    }

    public function postView($id)

    {
        DB::beginTransaction();

        try
        {
            $model = $this->model->find($id);

            $count = count(Input::get('action'));

            $this->right->whereRoleId($model->id)->delete();

            for($a=0;$a<$count;$a++)
            {
                $this->right->create([
                    'role_id' => $model->id,
                    'menu_action_id' => Input::get('action')[$a],
                ]);
            }

            DB::commit();

            return redirect(helper()->urlAction().'/index')->withSuccess('Data has been updated');
        
        }catch(\Exception $e){
            DB::rollback();

            return redirect(helper()->urlAction().'/index')->withInfo('Transaction SQL failed');
        
        }

        
    }
}
