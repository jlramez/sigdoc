<?php

namespace App;
use App\roles;
use App\User;

use Illuminate\Database\Eloquent\Model;

class asigna_roles extends Model
{
    public function users()
	{

		return $this->belongsTo(User::class);

	}
    public function roles()
	{

		return $this->belongsTo(roles::class);

	}
}
