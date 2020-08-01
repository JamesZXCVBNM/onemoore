<?php

namespace App\Jobs;

use App\Models\Dividend;
use App\Models\Symbol;
use App\Services\EODService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class GetStockDividends implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	public $symbol;
	
	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	public function __construct(Symbol $symbol)
	{
		$this->symbol = $symbol;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		$uri = 'div/'.$this->symbol->ticker.'.'.$this->symbol->exchange->code.'?from='. (date('Y') - 1) .'-01-01&fmt=json';
		$s = new EODService($uri);

		$dividends = $s->handle();
		foreach ($dividends as $d) {
			$this->symbol->dividends()->firstOrCreate([
				'ex_date' => $d['date'],
				'pay_date' => $d['paymentDate'] ?: null,
				'record_date' => $d['recordDate'] ?: null,
				'declaration_date' => $d['declarationDate'] ?: null,
				'amount' => $d['value'],
			]);
		}
		$this->symbol->update(['dividends_updated_at' => date('Y-m-d')]);
	}
}
