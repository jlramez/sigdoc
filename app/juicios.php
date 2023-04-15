<?php

namespace App;
use App\expedientes;

use Illuminate\Database\Eloquent\Model;

class juicios extends Model
{
    public function expedientes()
	{

		return $this->belongsTo(expedientes::class);

    }
}
