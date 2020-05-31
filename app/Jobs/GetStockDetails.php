<?php

namespace App\Jobs;

use App\Models\Sector;
use App\Models\Symbol;
use App\Services\FinnhubService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GetStockDetails implements ShouldQueue
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
		$s = new FinnhubService('stock/profile2?symbol='.$this->symbol->ticker);
		$data = $s->handle();

		if (count(array_keys($data))) {
			$sector = Sector::firstOrCreate(['name' => $data['finnhubIndustry']]);
			$this->symbol->update([
				'logo' => $data['logo'] ?: null,
				'name' => $data['name'],
				'sector_id' => $sector->id,
			]);
		}
		else {
			$this->symbol->delete();
		}
	}
}
