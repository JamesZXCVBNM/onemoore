<?php

namespace App\Http\Controllers;

use App\Http\Resources\PositionResource;
use App\Models\Position;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function portfolio()
	{
		$portfolio = PositionResource::collection(
			Position::belongsToAuth()
				->with('symbol', 'symbol.sector', 'symbol.dividends')
				->get()
				->sortBy('symbol.ticker')
		);

		return $portfolio;

		// $portfolio = Position::belongsToAuth()->with('symbol', 'symbol.sector', 'symbol.dividends')->get();

		// $portfolio = $portfolio->map(function($item, $key) {
		// 	$monthly = [];
		// 	$divs = $item->symbol->dividends;
		// 	foreach ($divs as $div) {
		// 		$monthly[Carbon::parse($div->pay_date)->month] = number_format($div->amount * $item->quantity, 2, '.', '');
		// 	}
		// 	$item['monthly'] = $monthly;
		// 	return $item;
		// });

		// $sectors = [];
		// $grouped = $portfolio->groupBy('symbol.sector.name');
		// $x = $x->map(function($item, $key) {
		// 	$item['dividends'] = array_sum($item->symbol->dividends->pluck('amount'));
		// 	return $item;
		// });

	}
}
