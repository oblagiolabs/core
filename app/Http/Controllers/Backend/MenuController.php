<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Backend\BackendController;
use App\Models\Menu;
use App\Models\MenuAction;
use App\Models\Action;
use Datatables;
use Input;
use DB;
class MenuController extends BackendController
{
	public $model;
    public $action;
    public $menuAction;
	protected $parents;

	public function __construct()

	{
		$this->model = new Menu;
	    $this->action = new Action;
        $this->menuAction = new MenuAction;
        $this->model = new Menu;
       
		$this->parents = ['0' => 'This Parent Menu'] + $this->model->whereParentId(0)->lists('label' ,'id')->toArray();
	}

    public function getIndex()

    {
    	$model = $this->model;
    	
    	return view('backend.menu.index' , compact('model'));

    }

    public function getCreate()

    {
		$model = $this->model;
    	$parents = $this->parents;
    	return view('backend.menu.form' , compact('model' , 'parents'));

    }

    public function postCreate(Request $request)

    {
    	$inputs = $request->all();

    	// creating controller
    		
    		if($request->controller != '#')
    		{
    			$path = str_replace('\\', '/', $request->controller);
	    		
	    		\Artisan::call('make:controller' , [
	    		
	    			'--plain' => true , 
	    			'name' => $path,
	    		
	    		]);
    		}
	    //

    	$create = $this->model->create($inputs);

    	return redirect(helper()->urlAction().'/index')->withSuccess('Data has been saved');
    
    }

    public function getUpdate($id)

    {
		$model = $this->model->find($id);
    	$parents = $this->parents;
    	return view('backend.menu.form' , compact('model' , 'parents'));

    }

    public function postUpdate(Request $request , $id)

    {
    	$inputs = $request->all();

    	$create = $this->model->find($id)->update($inputs);

    	return redirect(helper()->urlAction().'/index')->withSuccess('Data has been update');
    
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

        $action = $this->action->all();

        $menuAction = $this->menuAction;

        return view('backend.menu.view' , compact('model' , 'action' , 'menuAction'));
    }

    public function postView($id)

    {
        $model = $this->model->find($id);

        if(!empty($model->id))
        {

            DB::beginTransaction();

            try
            {
                $count = count(Input::get('action'));

                $deleteMenuAction = $this->menuAction->whereMenuId($id)->delete();

                for($a=0;$a<$count;$a++)
                {
                    $this->menuAction->create([
                        'action_id' => Input::get('action')[$a],
                        'menu_id' => $id,
                    ]);
                }  
                DB::commit();
            
                return redirect(helper()->urlAction().'/index')->withSuccess('Data has been updated');
                
            }catch(\Exception $e){
            
                DB::rollback();    
                return redirect(helper()->urlAction().'/index')->withInfo('Transaction SQL Failed');
            
            }

        }else{
            redirect('404');
        }

    }
}
