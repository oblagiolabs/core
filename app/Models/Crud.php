<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $table = 'cruds';

   public $guarded = [];

    // jika anda mengaktifkan ajax validasi maka wajib ditulis seperti dibawah ini
    
    public $messages = ['name.required' => 'nama gaboleh kosong']; // messages unttuk validasi
    
    public function rules($id = "")
    
     // method rules (aturan) yang harus di tulis jika ingin menggunakan ajax form validasi bawaan oblagio
     // Wajib Ditulis public function rules()
    {

    	if(!empty($id))
    	{
    		$unique = ',name,'.$id;
    	}else{
    		$unique = '';
    	}

    	return [
    		'name' => 'required|unique:cruds'.$unique,
    		'role' => 'required',
    		'address' => 'required'
    	];
    }

    //
    
    
}
