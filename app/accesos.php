<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class accesos extends Model
{
    protected $fillable = ['id','user_id','ip','last_login'];

    public function user()
	{

		return $this->belongsTo(User::class);

	}
    public function scopelast_login($query,$search)
	{
		if($search)
			{
                return $query->where('last_login', 'LIKE', "%$search%");
			}	
	
	}

}
