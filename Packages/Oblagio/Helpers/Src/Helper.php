<?php namespace Oblagio\Helpers;

use Request;

class Helper

{
	
	public $appName = 'Oblagio Core';

	public $backendName;

	public function __construct()

	{
		$this->backendName = config('config.backendName');
	}

	public function assetUrl()

	{
		return asset(null);
	}

	public function publicContent($path = "")

	{
		return $this->assetUrl().'contents/'.$path;
	}

	public function publicPathContents($path ="")

	{
		return public_path('contents/'.$path);
	}

	public function adminLte()

	{

		return $this->assetUrl().'adminlte/';

	}

	public function elfinder()

	{
		return $this->assetUrl().'oblagio/elfinder/';
	}

	public function injectModel($model)

	{
		$ins =  "App\Models\\$model";
		return new $ins;
	}

	public function injectController($controller)

	{
		$ins = "App\Http\Controllers\\".$controller;
		return new $ins;
	}

	public function urlBackend($plus)

	{

		return url($this->backendName.'/'.$plus);

	}

	public function segment($segment)

	{
		return Request::segment($segment);

	}

	public function segmentController()
	
	{
		$segment =  $this->segment(2);
	
		if($segment == '')
		{
			return 'default';
		}else{
			return $segment;
		}
	}

	public function segmentAction()

	{
		$action = $this->segment(3);

		if($action == '')

		{
			return 'index';
		}else{
			return $action;
		}	
	}

	public function getAction()

	{
		$action = $this->segmentAction();

		if($action == 'index')

		{
			
			$str = 'List';

		}elseif($action == 'create'){
			
			$str = 'Create';

		}elseif($action == 'update'){
			
			$str = 'Update';

		}elseif($action == 'view'){
			
			$str = 'View';
		}else{
			$str = '';
		}

		return $str;
	}

	public function modelMenu()

	{
		return $model = $this->injectModel('Menu');
	}

	public function getMenu()

	{
		$model = $this->modelMenu()->wherePermalink($this->segmentController())->first();

		return $model;
	}

	public function getMenuParent()

	{
		$model = $this->modelMenu()->find($this->getMenu()->parent_id);

		return $model;
	}

	public function urlAction()

	{
		return $this->urlBackend($this->segmentController().'/');
	}

	public function breadCrumbs()

	{
		$controller = $this->injectController($this->getMenu()->controller);
		$breadcrumbs = $controller->breadcrumbs;

		if(!$breadcrumbs || $breadcrumbs == [])
		{

			$str =  '
			<ol class="breadcrumb">';

			if($this->getMenu()->parent_id != '0')
			{
	         $str .='<li class="">'.$this->getMenuParent()->label.'</li>';
			}
	        $str .='<li class="">'.$this->getMenu()->label.'</li>
	        '; 	
	          
	          if($this->getAction() != '')
	          {
	        	$str.='<li class="">'.$this->getAction().'</li>';
	          }	
	          	
	         $str.='</ol>
			';			

		}else{

			$str = '<ol class="breadcrumb">';
			foreach($breadcrumbs[$this->segmentAction()] as $row)
			{
				$str .= '<li class="">'.$row.'</li>';
			}
			$str .= '</ol>';
		}

		return $str;
	
	}

	// public function getRight($action)

	// {
	// 	$menu_id = @$this->getMenu()->id;
		
	// 	($menu_id == '') ? $menu_id = 0 : $menu_id = $menu_id;

	// 	$role_id = \Auth::user()->role_id;

	// 	$sql = "SELECT cek_right('$action' , $menu_id , $role_id) AS status";
	
	// 	$DB = \DB::select($sql);

	// 	return $DB[0]->status;
	// }

	public function getRight($action)

	{
		$cekAction = $this->injectModel('Action')->whereAction($action)->first(); // Cek Action in actions table
		if(!empty($cekAction->id))
		{
			$menu_id = @$this->getMenu()->id;
			
			$cekMenuAction = $this->injectModel('MenuAction')->whereActionId($cekAction->id)->whereMenuId($menu_id)->first();
			if(!empty($cekMenuAction->id))
			{
				$cekRight = $this->injectModel('Right')->whereRoleId(\Auth::user()->role_id)->whereMenuActionId($cekMenuAction->id)->first();

				if(!empty($cekRight))
				{
					return 'true';
				}else{
					return 'false';
				}

			}else{
				return 'go';	
			}
			
		}else{
			return 'go';
		}	
			
	}

	public function flash($title , $text , $type)

	{
		return "<script type=\"text/javascript\">
    			$(function(){
    				swal('".$title."' , '".$text."' , '".$type."');
    			});	
    				
    		</script>";
	}

	public function flashSuccess()

	{
		if(\Session::has('success'))
		{
			return $this->flash('Success' , \Session::get('success') , 'success');
		}
	}

	public function flashError()

	{
		if(\Session::has('error'))
		{
			return $this->flash('Error' , \Session::get('error') , 'error');
		}
	}

	public function flashInfo()

	{
		if(\Session::has('info'))
		{
			return $this->flash('Info' , \Session::get('info') , 'info');
		}
	}

	public function hash($str)

	{
		return md5(md5(md5('OBLAGIO CORE BY OBLAGIO LABS'.$str)));
	}
}