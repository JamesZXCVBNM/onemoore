<?php

namespace App\Observers;

use App\Jobs\GetEODQuote;
use App\Jobs\GetStockDividends;
use App\Models\Position;
use Carbon\Carbon;

class PositionObserver
{
	public function creating(Position $position)
	{
		$symbol = $position->symbol;
		$lastYear = date('Y') - 1;
		if (!$symbol->dividends_updated_at || Carbon::parse($symbol->dividends_updated_at)->year != $lastYear) {
			GetStockDividends::dispatch($symbol)->onQueue('eod');
		}
		if (!$symbol->quote) {
			GetEODQuote::dispatch($symbol)->onQueue('eod');
		}
	}
}
