<?php namespace Oblagio\Html;

use Form;

class Html

{
	public function link($label = "" , $url = "" , $property = [])

	{

		if($property == [])
		{
		
			$defaultProperty = 'class = "btn btn-default btn-sm"';
		
		}else{
			
			$defaultProperty = "";
			foreach($property as $key => $value)
			{
				$defaultProperty .= "$key = '$value'";
			}

		}

		return "<a href = '".$url."' $defaultProperty>".$label."</a>";
	}

	public function buttonCreate($label = "" , $url = "" , $property = [])

	{
		$label == '' ? $labelValue = '<i class="fa fa-plus"></i> &nbsp; Add new' : $labelValue = '';
	
		$url == '' ? $urlValue = helper()->urlAction().'/create' : $urlValue = $url;
	
		$property == [] ? $propertyValue = ['class' => 'btn btn-success btn-sm'] : $propertyValue = $property;
		
		if(helper()->getRight('create') ==  'true')
			return $this->link($labelValue , $urlValue , $propertyValue);
		else
			return '';

	}

	public function buttonDelete($id = "" , $label = "" , $url = "" , $property = [])

	{
		$label == '' ? $labelValue = '<i class="fa fa-trash"></i>' : $labelValue = '';
	
		$url == '' ? $urlValue = helper()->urlAction().'/delete/'.$id : $urlValue = $url;
	
		$property == [] ? $propertyValue = ['class' => 'btn btn-danger btn-sm' , 'onclick' => 'return confirm("Are you sure want to delete this item ?")'] : $propertyValue = $property;
		
		if(helper()->getRight('delete') ==  'true')
		{
			return $this->link($labelValue , $urlValue , $propertyValue);
		}else{
			return '';
		}
	
	}

	public function buttonUpdate($id = "" , $label = "" , $url = "" , $property = [])

	{
		$label == '' ? $labelValue = '<i class="fa fa-edit"></i>' : $labelValue = '';
	
		$url == '' ? $urlValue = helper()->urlAction().'/update/'.$id : $urlValue = $url;
	
		$property == [] ? $propertyValue = ['class' => 'btn btn-info btn-sm'] : $propertyValue = $property;
		if(helper()->getRight('update') ==  'true')
			return $this->link($labelValue , $urlValue , $propertyValue);
		else
			return '';
	}

	public function buttonView($id = "" , $label = "" , $url = "" , $property = [])

	{
		$label == '' ? $labelValue = '<i class="fa fa-eye"></i>' : $labelValue = '';
	
		$url == '' ? $urlValue = helper()->urlAction().'/view/'.$id : $urlValue = $url;
	
		$property == [] ? $propertyValue = ['class' => 'btn btn-success btn-sm'] : $propertyValue = $property;
		
		if(helper()->getRight('view') ==  'true')
		{
			return $this->link($labelValue , $urlValue , $propertyValue);
		}else{
			return '';
		}
	}

	public function buttons($id)

	{
		$deleteButton = $this->buttonDelete($id);
            
        $updateButton = $this->buttonUpdate($id);

        $viewButton = $this->buttonView($id);

        return $viewButton.' '.$updateButton.' '.$deleteButton;
	}

	public function oblagioTable($labels = [] , $property = [])

	{
		($property == []) ? $property = ['id' => 'oblagio-table' , 'class' => 'table table-striped'] : $property = $property;

		$str = "";
		
		foreach($property  as $key => $value)
		{
			$str .= "$key = '$value' ";
		}



		$table = "<table $str ><thead><tr>";
		
		$count = count($labels);
		
		if($count > 0)
		{
			$width = 100 / $count;
		}else{
			$width = 100;
		}
		
		foreach($labels as $key)
		{
			unset($key['data']);
			
			foreach($key as $val)
			{
				$table .= "<th width = '$width%'>".ucfirst($val)."</th>";
			}
		}

		$table .= "</tr></thead><tbody></tbdoy></table><div style = 'display:none;' id = 'div_oblagio_table'>".json_encode($labels)."</div>";

		return $table;
	}

	public function oblagioModal()

	{
		return '
		<div class="modal fade" id="elfinder_modal" role="dialog" >
		      <div class="modal-lg">
		      
		        <!-- Modal content-->
		        <div class="modal-content" style="width:100%;margin-left:30%;"> 
		          <div class="modal-header">
		            <button type="button" id = "elfinder_close" class="close" data-dismiss="modal">&times;</button>
		            <h4 class="modal-title">Libraries</h4>
		          </div>
		          <div class="modal-body">
		              
		              <iframe scrolling="no" style="border:none;width:100%;height:450px;overflow:hidden;" src = '.helper()->urlBackend("popup-elfinder").'>
		        
		              </iframe>



		          </div>
		          <div class="modal-footer">
		            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		          </div>
		        </div>
		        
		      </div>
		    </div>

		';
	}

	public function oblagioFile($type , $options = [])

	{
		$defaultName = 'image';
		$defaultPathName = helper()->assetUrl().'oblagio/images/image.png';
	
		(empty($options['name'])) ? $name = $defaultName : $name = $options['name'];

		(empty($options['pathName'])) ? $pathName = $defaultPathName : $pathName = $options['pathName'];

		$out ="

		<div id = 'image_display'>
            <img src= ".$pathName."  width = '200' height = '200' />
          </div>
          ".Form::hidden($name , null , ['class' => 'form-control' , 'id' => 'image'])."
          <a data-toggle='modal' data-target='#elfinder_modal' style = 'cursor:pointer;' onclick = 'addElfinder()'>Browse</a>

		";

		$out .= $this->oblagioModal();

		return $out;

	}
}