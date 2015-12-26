<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    protected $table = 'rights';

    public $guarded = [];

    public function role()

    {
    	return $this->belongsTo('App\Models\Role' , 'role_id');
    }

    public function menu_action()

    {
    	return $this->belongsTo('App\Models\MenuAction' , 'menu_action_id');
    }
}
