<?php

namespace App;
use App\User;
use App\tareas;


use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    public function usuarios()
	{

		return $this->belongsToMany(User::class,'asigna_roles','users_id');

	}

	
	public function tareas()
	{

		return $this->belongsToMany(tareas::class,'asigna_tareas');

	}
}
