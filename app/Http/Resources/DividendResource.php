<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DividendResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request)
	{
		return [
			// 'symbol_id' => $this->symbol_id,
			// 'ex_date' => $this->ex_date,
			'pay_date' => $this->pay_date,
			// 'record_date' => $this->record_date,
			// 'declaration_date' => $this->declaration_date,
			'amount' => $this->amount,
		];
	}
}
