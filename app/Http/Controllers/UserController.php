<?php

namespace App\Http\Controllers;

use App\Http\Resources\PositionResource;
use App\Http\Resources\UserResource;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;

class UserController extends Controller
{
	public function show()
	{
		return new UserResource(Auth::user());
	}

	public function update(Request $request, User $user)
	{
		$user->update($request->all());
	}
	
	public function portfolio()
	{
		$portfolio = PositionResource::collection(
			Position::belongsToAuth()
				->with('symbol', 'symbol.sector', 'symbol.dividends', 'symbol.dividends.rate')
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

	// public function linkStripe()
	// {
	// 	$customer = auth()->user()->createAsStripeCustomer();
	// 	return $customer;
	// }
}
