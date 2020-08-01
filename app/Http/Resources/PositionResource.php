<?php

namespace App\Http\Resources;

use App\Models\Rate;
use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
		$monthly = $this->calculateMonthly($this->symbol->lastYearDividends);
		$year_total = $this->calculateYear($monthly);
		$converted_quote = $this->convertCurrency($this->symbol->currency, $this->symbol->quote);
		$converted_cost = $this->convertCurrency($this->symbol->currency, $this->price);

		return [
			'id' => $this->id,
			'quantity' => $this->quantity,
			'price' => $this->price,
			'symbol' => new SymbolResource($this->symbol),
			'monthly' => $monthly,
			'year_total' => $year_total,
			'converted_quote' => $converted_quote,
			'converted_cost' => $converted_cost,
			'industry' => $this->symbol->sector->industry,
		];
	}

	public function calculateYear($monthly)
	{
		$total = 0;
		foreach ($monthly as $x) {
			$total += $x['user_currency'];
		}
		return round($total, 2);
	}

	public function calculateMonthly($dividends)
	{
		$monthly = [];
		foreach ($dividends as $div) {
			$arr = [
				'total' => number_format($div->amount * $this->quantity, 2, '.', ''),
				'per_share' => $div->amount,
				'rates' => $div->rate ? [
					'USD' => $div->rate['USD'],
					'CAD' => $div->rate['CAD'],
					'GBP' => $div->rate['GBP'],
				] : [],
			];
				
			$arr['user_currency'] = $this->convertCurrency($this->symbol->currency, $arr['total'], $arr['rates']);
			
			$monthly['month'.Carbon::parse($div->pay_date)->month] = $arr;
		}
		
		return $monthly;
	}

	public function convertCurrency($base, $total, $rates = null)
	{
		if (!$rates) $rates = Rate::latest()->first();

		$userCurrency = Auth::user()->currency;
		
		if ($userCurrency == 'GBP') {
			switch ($base) {
				case 'GBP':
					return $total;
	
				case 'GBX':
					return round(($total / 100), 2);
	
				case 'USD':
					return round($total * ( $rates['GBP'] / $rates['USD'] ), 2);
			}
		}
		else if ($userCurrency == 'USD') {
			switch ($base) {
				case 'GBP':
					return round($total * ( $rates['USD'] / $rates['GBP'] ), 2);
	
				case 'GBX':
					return round(($total / 100) * ( $rates['USD'] / $rates['GBP'] ), 2);
	
				case 'USD':
					return $total;
			}
		}
	}
}
