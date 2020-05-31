<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class PositionResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request)
	{
		$monthly = [];
		$divs = $this->symbol->dividends;
		foreach ($divs as $div) {
			$monthly['month'.Carbon::parse($div->pay_date)->month] = 
				[
					'total' => number_format($div->amount * $this->quantity, 2, '.', ''),
					'per_share' => $div->amount
				];
		}
		return [
			'id' => $this->id,
			'quantity' => $this->quantity,
			'price' => $this->price,
			'symbol' => new SymbolResource($this->symbol),
			'monthly' => $monthly,
		];
	}
}
