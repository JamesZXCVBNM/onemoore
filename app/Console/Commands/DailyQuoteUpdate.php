<?php

namespace App\Console\Commands;

use App\Jobs\GetEODQuote;
use App\Models\Symbol;
use Illuminate\Console\Command;

class DailyQuoteUpdate extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'daily:quote';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Update the stock prices for portfolio stocks';

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
		$symbols = Symbol::inPortfolio()->get();

		foreach ($symbols as $symbol) {
			GetEODQuote::dispatch($symbol)->onQueue('eod');
		}
	}
}
