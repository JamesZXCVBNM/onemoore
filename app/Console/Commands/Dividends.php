<?php

namespace App\Console\Commands;

use App\Models\Dividend;
use App\Models\Symbol;
use App\Services\FinnhubService;
use Illuminate\Console\Command;

class Dividends extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'x:div';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$year = date('Y');
		$symbols = Symbol::needsDividends()->get();
		foreach ($symbols as $s) {
			$uri = 'stock/dividend?symbol='.$s->ticker.'&from='. ($year - 1) .'-01-01&to='. $year .'-01-01';
			$service = new FinnhubService($uri);
			$dividends = $service->handle();
			foreach ($dividends as $d) {
				$s->dividends()->create([
					'ex_date' => $d['date'],
					'pay_date' => $d['payDate'],
					'record_date' => $d['recordDate'],
					'declaration_date' => $d['declarationDate'],
					'amount' => $d['amount'],
				]);
			}
			$s->update(['dividends_updated_at' => date('Y-m-d')]);
		}

	}
}
