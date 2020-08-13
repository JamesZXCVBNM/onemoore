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

	public function shared()
	{
		return UserResource::collection(User::with('portfolio')->shared()->get());
	}
	
	public function portfolio()
	{
		return PositionResource::collection(
			Position::belongsToAuth()
				->with('symbol', 'symbol.sector', 'symbol.dividends', 'symbol.dividends.rate')
				->get()
				->sortBy('symbol.ticker')
		);
	}
}
