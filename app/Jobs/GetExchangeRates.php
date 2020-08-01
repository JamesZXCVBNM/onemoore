<?php

namespace App\Jobs;

use App\Models\Rate;
use App\Services\FixerService;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GetExchangeRates implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	public $date;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	public function __construct($date)
	{
		$this->date = $date;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		$service = new FixerService();
		$response = $service->handle($this->date);
		Rate::firstOrCreate([
			'date' => $response['date']
		], [
			'USD' => $response['rates']['USD'],
			'GBP' => $response['rates']['GBP'],
			'CAD' => $response['rates']['CAD'],
		]);
	}
}
