<?php

namespace App;
use App\expedientes;

use Illuminate\Database\Eloquent\Model;

class incidencias extends Model
{
    public function expedientes()
	{

		return $this->belongsTo(expedientes::class);

    }

    public function scopeclave_inc($query,$search)
	{
		if($search)
			{
			return $query->where('clave_inc', 'LIKE', "%$search%");
			}	
	
	}
}
