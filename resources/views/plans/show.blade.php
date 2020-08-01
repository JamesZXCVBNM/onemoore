@extends('layouts.app')

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
	// Create a Stripe client.
	var stripe = Stripe('{{ env("STRIPE_KEY") }}');

	// Create an instance of Elements.
	var elements = stripe.elements();

	// Custom styling can be passed to options when creating an Element.
	// (Note that this demo uses a wider set of styles than the guide below.)
	var style = {
		base: {
			color: '#32325d',
			lineHeight: '18px',
			fontFamily: '"Roboto", Helvetica, sans-serif',
			fontSmoothing: 'antialiased',
			fontSize: '16px',
			'::placeholder': {
				color: '#aab7c4'
			}
		},
		invalid: {
			color: '#fa755a',
			iconColor: '#fa755a'
		}
	};

	const cardElement = elements.create('card', {
		style: style
	});
	cardElement.mount('#card-element');

	const cardHolderName = document.getElementById('card-holder-name');
	const cardButton = document.getElementById('card-button');
	const clientSecret = cardButton.dataset.secret;

	cardButton.addEventListener('click', async (e) => {
		e.preventDefault()
		const { setupIntent, error } = await stripe.confirmCardSetup(
			clientSecret, {
				payment_method: {
					card: cardElement,
					billing_details: { name: cardHolderName.value }
				}
			}
		);

		if (error) {
			// Display "error.message" to the user...
		} else {
			// The card has been verified successfully...
			var form = document.getElementById('payment-form');
			var paymentMethod = document.createElement('input');
			paymentMethod.setAttribute('type', 'hidden');
			paymentMethod.setAttribute('name', 'paymentMethod');
			paymentMethod.setAttribute('value', setupIntent.payment_method);
			form.appendChild(paymentMethod);
			form.submit();
		}
	});
	

</script>
@endsection

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="">
				<p>You will be charged £{{ number_format($plan->cost, 2) }} for {{ $plan->name }} Plan</p>
				<p>{{ $plan->description }} </p>
			</div>
			<div class="card">
				
				<div class="card-body">

					@if (Auth::user()->subscribed('default'))
						<div class="alert alert-success bw--2 font-weight-bold" role="alert">
							You are already subscribed :)
						</div>
					@else 
						<form action="{{ route('subscriptions.store') }}" method="post" id="payment-form">
							@csrf
							
							<input type="hidden" name="plan" value="{{ $plan->id }}" />

							{{-- Card Holder Name --}}
							<div class="form-group">
								<label for="card-holder-name">Card Holder Name</label>
								<input id="card-holder-name" type="text" class="form-control">
							</div>
		
							<!-- Card Details -->
							<div class="form-group">
								<label for="card-element">Credit/Debit Card Details</label>
								<div class="form-control">
									<div id="card-element"></div>
								</div>
							</div>
		
							<div class="form-group">
								<button class="btn btn-dark" id="card-button" data-secret="{{ $intent->client_secret }}">
									Update Payment Method
								</button>
							</div>

						</form>
					@endif
					
				</div>
				
			</div>
		</div>
	</div>
</div>

@endsection
