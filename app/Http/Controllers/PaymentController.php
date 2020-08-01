<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
	public function index()
	{
		return view('account', [
			'intent' => auth()->user()->createSetupIntent()
		]);
	}
	public function store(Request $request)
	{
		dd($request->all());
		$user = $request->user();
		$user->addPaymentMethod($request->stripeToken);
		dd($user);
		// $r = $user->newSubscription('standard', 'monthly')->create($request->stripeToken);
		// dd($r);
	}
}
