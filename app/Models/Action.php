<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'actions';

    public $guarded = [];

    public function rules($id)

    {
    	if(!empty($id))
    	{
    		$unique = ',action,'.$id;
    	}else{
    		$unique = '';
    	}

    	return [
    		'action' => 'required|unique:actions'.$unique,
    		'label' => 'required'
    	];
    }

    public function menu_actions()

    {
        return $this->HasMany('App\Models\MenuAction' , 'id');
    }
}
