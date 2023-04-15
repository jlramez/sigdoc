<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actuaciones extends Model
{
  
    public function documentos()
	{

		return $this->belongsToMany(documentos::class,'documentos');

	}
	
	public function scopeNombre($query,$search)
	{
		if($search)
			{
                return $query->where('Nombre', 'LIKE', "%$search%");
			}	
	
	}
	
   
}
