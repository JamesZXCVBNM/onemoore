<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Subscription;

class User extends Authenticatable implements MustVerifyEmail
{
	use Notifiable, Billable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'username', 'email', 'password', 'is_shared', 'currency',
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

	public function portfolio()
	{
		return $this->hasMany(Position::class);
	}

	public function symbols()
	{
		return $this->hasManyThrough(Symbol::class, Position::class);
	}

	public function positions()
	{
		return $this->hasMany(Position::class);
	}

	public function scopeShared($query)
	{
		return $query->where('is_shared', 1);
	}
}
