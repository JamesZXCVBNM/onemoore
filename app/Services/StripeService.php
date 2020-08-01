<?php

namespace App\Services;

use App\Models\User;

class StripeService 
{
	public function __construct() 
	{
		
	}

	public function stripeCustomer(User $user)
	{
		return $user->createOrGetStripeCustomer();
	}

	public function checkPaymentMethod(User $user)
	{
		return $user->hasDefaultPaymentMethod();
	}
}