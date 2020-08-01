<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubscriptionResource;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Laravel\Cashier\Subscription;

class SubscriptionController extends Controller
{
	public function index()
	{
		return new SubscriptionResource(Auth::user()->subscriptions->first());
	}

	public function createCheckoutSession(Request $request)
	{
		$plan = Plan::findOrFail($request->plan);

		\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

		$session = \Stripe\Checkout\Session::create([
			'payment_method_types' => ['card'],
			'line_items' => [[
				'price' => $plan->stripe_plan,
				'quantity' => 1,
			]],
			'mode' => 'subscription',
			'success_url' => 'http://localhost:8000/home?session_id={CHECKOUT_SESSION_ID}',
			'cancel_url' => 'http://localhost:8000/plans',
		]);

		return $session['id'];
	}

	public function store(Request $request)
	{
		$plan = Plan::findOrFail($request->plan);

		$request->user()->deletePaymentMethods();
		$request->user()->updateDefaultPaymentMethod($request->paymentMethod);

		try {
			$request->user()
				->newSubscription($plan->name, $plan->stripe_plan)
				->create($request->stripeToken);
		}
		catch (IncompletePayment $exception) {
			return redirect()->route(
				'cashier.payment',
				[$exception->payment->id, 'redirect' => route('account')]
			);
		}
		
		return redirect()->route('account')->with('success', 'Your plan subscribed successfully');
	}

	public function destroy(Request $request, Subscription $subscription)
	{
		// $user = $request->user()->asStripeCustomer();
		$subscription->cancel();
	}
}
