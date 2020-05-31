<?php

namespace App\Jobs;

use App\Models\Symbol;
use App\Services\FinnhubService;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
		$year = date('Y');

		$uri = 'stock/dividend?symbol='.$this->symbol->ticker.'&from='. ($year - 1) .'-01-01&to='. $year .'-01-01';
		$s = new FinnhubService($uri);

		sleep(3);

		$dividends = $s->handle();
		foreach ($dividends as $d) {
			$this->symbol->dividends()->create([
				'ex_date' => $d['date'],
				'pay_date' => $d['payDate'],
				'record_date' => $d['recordDate'],
				'declaration_date' => $d['declarationDate'],
				'amount' => $d['amount'],
			]);
		}
		$this->symbol->update(['dividends_updated_at' => date('Y-m-d')]);
	}
}
