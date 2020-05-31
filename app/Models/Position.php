<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Position extends Model
{
	protected $fillable = ['symbol_id', 'user_id', 'quantity', 'price'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function symbol()
	{
		return $this->belongsTo(Symbol::class);
	}

	public function scopeBelongsToAuth($query)
	{
		return $query->where('user_id', Auth::id());
	}
}
