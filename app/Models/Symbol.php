<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

class Symbol extends Model
{
    use SoftDeletes, Searchable;
    
    protected $fillable = ['sector_id', 'exchange_id', 'ticker', 'name', 'logo', 'dividends_updated_at'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function dividends()
    {
        return $this->hasMany(Dividend::class);
    }

    public function scopeOwnedByUser($query)
    {
        return $query->whereHas('userSymbol', function($q) {
            $q->where('user_id', Auth::id());
        });
    }

    public function scopeNeedsDividends($query)
	{
		return $query
			->has('positions')
			->where(function($q) {
				$q
					->whereNull('dividends_updated_at')
					->orWhere('dividends_updated_at', '<', date('Y').'-01-01');
			});
	}
}
