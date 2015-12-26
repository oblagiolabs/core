<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuAction extends Model
{
    protected $table = 'menu_actions';

    public $guarded = [];

    public function menu()

    {
    	return $this->belongsTo('App\Models\Menu' , 'menu_id');
    }

    public function action()

    {
    	return $this->belongsTo('App\Models\Action' , 'action_id');
    }

    public function rights()

    {
      return $this->hasMany('App\Models\Right' , 'id');
    }
}
