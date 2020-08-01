<?php

namespace App\Console\Commands;

use App\Jobs\GetExchangeRates;
use App\Services\FixerService;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Console\Command;

class Rates extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'x:rate {date?}';

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
		$start = new DateTime('2018-01-01');
		$end = new DateTime('2019-01-01');
		$interval = new DateInterval('P1D');
		$period = new DatePeriod($start, $interval, $end);

		foreach ($period as $date) {
			$date = $date->format('Y-m-d');
			GetExchangeRates::dispatch($date);
		}

		// $date = $this->argument('date') ?: date('Y-m-d');
		// GetExchangeRates::dispatch($date);
		
		// $service = new FixerService();
		// $response = $service->handle($date);
	}
}
