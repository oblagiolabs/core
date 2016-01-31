<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    public $guarded = [];

    public function rules()

    {
    	return [
    		'permalink' => 'required',
    	//	'controller' => 'required',
    		'label' => 'required',
    	];
    }

    public function menu_actions()

    {
        return $this->HasMany('App\Models\MenuAction' , 'id');
    }
}
