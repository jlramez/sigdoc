<?php

namespace App;
use App\expedientes;
use App\actuaciones;

use Illuminate\Database\Eloquent\Model;

class documentos extends Model
{
    
        protected $guarded = [];

        public function expedientes()
        {
    
            return $this->belongsToMany(expedientes::class,'asignadocumentos');
    
        }
        public function actuaciones()
        {
    
            return $this->belongsTo(actuaciones::class);
    
        }
    
        
        
    
}
