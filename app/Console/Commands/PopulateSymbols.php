<?php

namespace App\Console\Commands;

use App\Jobs\GetStockDetails;
use App\Models\Symbol;
use Illuminate\Console\Command;

class PopulateSymbols extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'x:test';

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
		$stocks = Symbol::whereNull('sector_id')->get();
		foreach ($stocks as $stock) {
			GetStockDetails::dispatch($stock)->onQueue('finnhub');
		}
	}
}
