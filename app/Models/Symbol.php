<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

class Symbol extends Model
{
	use SoftDeletes, Searchable;
	
	protected $fillable = ['sector_id', 'exchange_id', 'ticker', 'name', 'logo', 'quote', 'dividends_updated_at'];

	public function sector()
	{
		return $this->belongsTo(Sector::class);
	}

	public function exchange()
	{
		return $this->belongsTo(Exchange::class);
	}

	public function positions()
	{
		return $this->hasMany(Position::class);
	}

	public function dividends()
	{
		return $this->hasMany(Dividend::class);
	}

	public function lastYearDividends()
	{
		$end = new DateTime('1st January');
		$start = new DateTime('1st January');
		return $this->hasMany(Dividend::class)->whereBetween('pay_date', [$start->modify('-1 year')->format('Y-m-d'), $end->format('Y-m-d')]);
	}

	public function scopeInPortfolio($query)
	{
		return $query->has('positions');
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
