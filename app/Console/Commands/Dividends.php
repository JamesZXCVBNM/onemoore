<?php

namespace App\Console\Commands;

use App\Jobs\GetStockDividends;
use App\Models\Dividend;
use App\Models\Symbol;
use App\Services\EODService;
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
		// $s = Symbol::find(4318);
		// $uri = 'div/'.$s->ticker.'.'.$s->exchange->code.'?from='. (date('Y') - 1) .'-01-01&fmt=json';
		// $service = new EODService($uri);
		// $dividends = $service->handle();
		// // dd($dividends);
		// foreach ($dividends as $d) {
		// 	$s->dividends()->create([
		// 		'ex_date' => $d['date'],
		// 		'pay_date' => $d['paymentDate'],
		// 		'record_date' => $d['recordDate'],
		// 		'declaration_date' => $d['declarationDate'],
		// 		'amount' => $d['value'],
		// 	]);
		// }
		// $s->update(['dividends_updated_at' => date('Y-m-d')]);

		$symbols = Symbol::needsDividends()->with('exchange')->get();
		foreach ($symbols as $s) {
			GetStockDividends::dispatch($s)->onQueue('eod');
		}
	}
}
