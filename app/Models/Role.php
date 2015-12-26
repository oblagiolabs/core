<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   protected $table = 'roles';

   public $guarded = [];

   public function rules($id = "")

   {	
   		$id == "" ? $unique = "" : $unique = ",role,".$id;

   		return [
   			'role' => 'required|max:225|unique:roles'.$unique,
   		];
   }

   public function users()

   {
   		return $this->hasMany('App\Models\User' , 'id');
   }

   public function rights()

    {
      return $this->hasMany('App\Models\Right' , 'id');
    }
}
