<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $table = 'cruds';

   public $guarded = [];

    // jika anda mengaktifkan ajax validasi maka wajib ditulis seperti dibawah ini
    
    public $messages = ['name.required' => 'nama gaboleh kosong'];
    
    public function rules($id = "")

    {

    	if(!empty($id))
    	{
    		$unique = ',name,'.$id;
    	}else{
    		$unique = '';
    	}

    	return [
    		'name' => 'required|unique:cruds'.$unique,
    		'role' => 'required|email',
    		'address' => 'required'
    	];
    }

    //
    
    
}
