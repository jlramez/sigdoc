<?php

namespace App;
use App\juicios;
use App\incidencias;

use Illuminate\Database\Eloquent\Model;
use App\actuaciones;

class expedientes extends Model
{
  
        
	public function documentos()
	{

		return $this->belongsToMany(documentos::class,'documentos');

	}

	public function juicios()
	{

		return $this->belongsTo(juicios::class);

    }

	public function scopeFolio($query,$search)
	{
		if($search)
			{
			return $query->where('folio', 'LIKE', "%$search%");
			}	
	
	}
	public function incidencias()
	{

		return $this->belongsTo(incidencias::class);

    }

}
