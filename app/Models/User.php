<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $hidden = ['verify_password'];

    protected $fillable = ['username' , 'email' , 'name' , 'role_id' ,'password'];

    public function rules($id = "")

    {

    	if(!empty($id))
    	{
    		$usernameUnique = ',username,'.$id;
    		$emailUnique = ',email,'.$id;
    	}else{
    		$usernameUnique = '';
    		$emailUnique = '';
    	}

    	return [
    		'username' => 'required|max:225|unique:users'.$usernameUnique,
    		'email' => 'required|email|max:225|unique:users'.$emailUnique,
    		'name' => 'required|max:225',
    		'password' => 'required|min:4',
    		'verify_password' => 'required|same:password',
    	]; 
    }

    public function role()

    {
    	return $this->belongsTo('App\Models\Role','role_id');
    }
}
