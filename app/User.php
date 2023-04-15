<?php

namespace App;
use App\roles;
use App\Traits\asignarolesandtareas;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\accesos;

class User extends Authenticatable
{
    use Notifiable, asignarolesandtareas;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
	{

		return $this->belongsToMany(roles::class,'asigna_roles','users_id');

    }
    public function asigna_roles()
	{

		return $this->belongsTo(asigna_roles::class);

	}
    public function accesos()
	{

		return $this->belongsTo(accesos::class);

	}
}
