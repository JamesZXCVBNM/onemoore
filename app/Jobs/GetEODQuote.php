<?php

namespace App\Jobs;

use App\Models\Symbol;
use App\Services\EODService;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GetEODQuote implements ShouldQueue
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
		$dt = new DateTime('now');
		$date = $dt->modify('- 7 days')->format('Y-m-d');
		$uri = 'eod/'.$this->symbol->ticker.'.'.$this->symbol->exchange->code.'?from='.$date.'&fmt=json&filter=close';
		$service = new EODService($uri);
		$array = $service->handle();
		$this->symbol->update(['quote' => end($array)]);
	}
}
