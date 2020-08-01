
<script>
	// var stripe = Stripe('{{ env("STRIPE_KEY") }}');

	// Create an instance of Elements.
	// var elements = stripe.elements();

	// // Custom styling can be passed to options when creating an Element.
	// // (Note that this demo uses a wider set of styles than the guide below.)
	// var style = {
	// 	base: {
	// 		color: '#32325d',
	// 		lineHeight: '18px',
	// 		fontFamily: 'Roboto, Helvetica, sans-serif',
	// 		fontSmoothing: 'antialiased',
	// 		fontSize: '16px',
	// 		'::placeholder': {
	// 			color: '#aab7c4'
	// 		}
	// 	},
	// 	invalid: {
	// 		color: '#fa755a',
	// 		iconColor: '#fa755a'
	// 	}
	// };

	// const cardElement = elements.create('card', {
	// 	style: style
	// });
	// cardElement.mount('#card-element');

	// const cardHolderName = document.getElementById('card-holder-name');
	// const cardButton = document.getElementById('card-button');
	// const clientSecret = cardButton.dataset.secret;

	// cardButton.addEventListener('click', async (e) => {
	// 	e.preventDefault()
	// 	const { setupIntent, error } = await stripe.confirmCardSetup(
	// 		clientSecret, {
	// 			payment_method: {
	// 				card: cardElement,
	// 				billing_details: { name: cardHolderName.value }
	// 			}
	// 		}
	// 	);

	// 	if (error) {
	// 		// Display "error.message" to the user...
	// 	} else {
	// 		// The card has been verified successfully...
	// 		var form = document.getElementById('payment-form');
	// 		var paymentMethod = document.createElement('input');
	// 		paymentMethod.setAttribute('type', 'hidden');
	// 		paymentMethod.setAttribute('name', 'paymentMethod');
	// 		paymentMethod.setAttribute('value', setupIntent.payment_method);
	// 		form.appendChild(paymentMethod);
	// 		form.submit();
	// 	}
	// });

</script>
<script>
let stripe = null
export default {
	props: ['intent', 'plan', 'stripeKey'],
	data() {
		return {
			loading: false,
			style: {
				base: {
					color: '#32325d',
					lineHeight: '18px',
					fontFamily: 'Roboto, Helvetica, sans-serif',
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
			},
			payment_method: {
				card: null,
				billing_details: { name: null }
			},
			iframe: null,
		}
	},
	methods: {
		async paymentBtnClicked() {

			this.loading = true

			const { setupIntent, error } = await stripe.confirmCardSetup(
				this.intent, {
					payment_method: this.payment_method
				}
			)

			if (error) {
				// Display "error.message" to the user...
				alert(error.message)
				this.loading = false
			} else {
				// The card has been verified successfully...
				axios.post(`/subscriptions`, {
					paymentMethod: setupIntent.payment_method,
					plan: this.plan.id,
				}).then(response => {
					location.href = "/account"
				}).catch(err => {
					console.log(err)
				})
			}
		}
	},
	mounted() {
		stripe = Stripe(this.stripeKey)
		var elements = stripe.elements()

		this.payment_method.card = elements.create('card', { style: this.style })
		this.payment_method.card.mount('#card-element')
	}
}
</script>
<template>
	<div>
		
		<b-card class="my-4">
			
			<b-form-text>
				<p class="text-dark"><i class="fas fa-arrow-right mr-1"></i> Total due now: £<span v-text="plan.cost"></span></p>
				<p class="text-dark"><i class="fas fa-arrow-right mr-1"></i> Subscribing to: <span v-text="plan.name"></span></p>
			</b-form-text>
				
			<div class="form-group">
				<label for="card-holder-name">Card Holder Name</label>
				<input id="card-holder-name" type="text" class="form-control" v-model="payment_method.billing_details.name">
			</div>
	
			<!-- Card Details -->
			<div class="form-group">
				<label for="card-element">Credit/Debit Card Details</label>
				<div class="form-control">
					<div id="card-element"></div>
				</div>
			</div>
	
			<div class="form-group">
				<button class="btn btn-dark btn-noshadow" id="card-button" @click="paymentBtnClicked" :disabled="loading">
					<i class="fas fa-spinner fa-spin" v-if="loading"></i> Pay Now
				</button>
			</div>
		
		</b-card>
		
	</div>
</template>