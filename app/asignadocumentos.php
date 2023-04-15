<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignadocumentos extends Model
{
    protected $guarded = [];

    public function documentos()
	{

		return $this->belongsTo(documentos::class);

	}
    public function expedientes()
	{

		return $this->belongsTo(documentos::class);

	}
    public function actuaciones()
	{

		return $this->belongsTo(actuaciones::class);

	}
}
