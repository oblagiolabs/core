<?php namespace Oblagio\Html;


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
}