@extends('layouts.app')

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ mix('js/plans.js') }}"></script>
@endsection

@section('content')

<div class="container py-3" v-if="!selectedPlan">
	<div class="row align-items-center no-gutters">

		<div class="col-12 col-md-6 col-lg-5 col-xl-4 z-index-1 shadow-dark-xs my-3">

			<div class="card b-0 shadow-xs">

				<div class="bg-light overlay-dark overlay-opacity-2 pt-3 pb-3">

					<h3 class="text-center">
						<span class="fs--13 badge badge-secondary badge-pill font-weight-light pl-2 pr-2 pt--6 pb--6 font-weight-bold">
							MONTHLY PLAN
						</span>
					</h3>

					<div class="d-flex justify-content-center">
						<span class="mb-0 mt-3 h3">£</span>
						<span class="mb-0 display-3 font-weight-normal">1.19</span>
						<span class="mb-3 align-self-end h3 font-weight-light">/mo</span>
					</div>

					<p class="text-center">
						billed monthly
					</p>
				</div>

				<div class="w-100 h--1 position-relative">
					<svg class="mt--n70" width="100%" height="50" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
						<path style="opacity:0.15" d="M 1000 299 l 2 -299 c -155 -36 -310 135 -415 164 c -102.64 28.35 -149 -32 -232 -31 c -80 1 -142 53 -229 80 c -65.54 20.34 -101 15 -126 11.61 v 54.39 z"></path>
						<path style="opacity:0.3" d="M 1000 286 l 2 -252 c -157 -43 -302 144 -405 178 c -101.11 33.38 -159 -47 -242 -46 c -80 1 -145.09 54.07 -229 87 c -65.21 25.59 -104.07 16.72 -126 10.61 v 22.39 z"></path>
						<path style="opacity:1" d="M 1000 300 l 1 -210.29 c -211 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"></path>
					</svg>
				</div>

				<div class="p--30 pb--40">

					<div class="d-flex mb-3">
						<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
							<i class="fas fa-check"></i>
						</div>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12 cursor-help" v-b-popover.hover="'This limit may increase in the future, I need to ensure I maintain a good service for everyone first. That\'s why the limit.'">
							Up to 100 positions
						</p>
					</div>

					<div class="d-flex mb-3">
						<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
							<i class="fas fa-check"></i>
						</div>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							View shared portfolios
						</p>
					</div>

					<div class="d-flex mb-3">
						<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
							<i class="fas fa-check"></i>
						</div>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							More features coming!
						</p>
					</div>
				</div>

				<b-button @click="planSelected('standard-monthly')" class="card-btn btn btn-block btn-lg btn-secondary btn-noshadow rounded-top-0">
					Choose this plan
				</b-button>

			</div>

		</div>

		<div class="col-12 col-md-6 col-lg-5 col-xl-4 z-index-2 ml--n15 mr--n15 m-0-xs position-relative shadow-dark-md my-3">

			<div class="card b-0 shadow-xs">

				<div class="bg-light overlay-dark overlay-opacity-2 pt-5 pb-5">

					<h3 class="text-center">
						<span class="fs--13 badge badge-primary badge-pill font-weight-light pl-2 pr-2 pt--6 pb--6 font-weight-bold">
							ANNUAL PLAN
						</span>
					</h3>

					<div class="d-flex justify-content-center">
						<span class="mb-0 mt-3 h3">£</span>
						<span class="mb-0 display-3 font-weight-normal">0.99</span>
						<span class="mb-3 align-self-end h3 font-weight-light">/mo</span>
					</div>

					<p class="text-center">
						billed annually
					</p>

				</div>

				<div class="w-100 h--1 position-relative">
					<svg class="mt--n70" width="100%" height="50" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
						<path style="opacity:0.15" d="M 1000 299 l 2 -299 c -155 -36 -310 135 -415 164 c -102.64 28.35 -149 -32 -232 -31 c -80 1 -142 53 -229 80 c -65.54 20.34 -101 15 -126 11.61 v 54.39 z"></path>
						<path style="opacity:0.3" d="M 1000 286 l 2 -252 c -157 -43 -302 144 -405 178 c -101.11 33.38 -159 -47 -242 -46 c -80 1 -145.09 54.07 -229 87 c -65.21 25.59 -104.07 16.72 -126 10.61 v 22.39 z"></path>
						<path style="opacity:1" d="M 1000 300 l 1 -210.29 c -211 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"></path>
					</svg>
				</div>

				<div class="text-center">
					<p class="text-dark font-weight-normal mt-3 cursor-help" v-b-popover.hover.top="'Stripe takes a flat 20p + 1.4% transaction fee. By choosing to be billed annually, that\'s more cost effective for me and so I pass that saving onto you!'">
						<i class="fas fa-piggy-bank text-primary mr-1"></i>
						<span class="font-weight-bold">12</span> 
						months for the price of 
						<span class="font-weight-bold">10</span>
					</p>        
				</div>

				<div class="p--30 pb--40">

					<div class="d-flex mb-3">
						<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
							<i class="fas fa-check"></i>
						</div>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12 cursor-help" v-b-popover.hover="'This limit may increase in the future, I need to ensure I maintain a good service for everyone first. That\'s why the limit.'">
							Up to 100 positions
						</p>
					</div>

					<div class="d-flex mb-3">
						<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
							<i class="fas fa-check"></i>
						</div>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							View shared portfolios
						</p>
					</div>

					<div class="d-flex mb-3">
						<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
							<i class="fas fa-check"></i>
						</div>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							More features coming!
						</p>
					</div>
				</div>

				<b-button @click="planSelected('standard-annual')" variant="primary" class="card-btn btn btn-block btn-lg btn-primary btn-noshadow rounded-top-0">
					Choose this plan
				</b-button>

			</div>

		</div>

		<div class="col-12 col-md-6 col-lg-5 col-xl-4 z-index-1 ml--n15 mr--n15 m-0-xs position-relative shadow-dark-xs my-3">
			<div class="my-5 pl--60 pr--60">
				<h3 class="font-weight-light">Pricing Philosophy</h3>
				<small class="">
					I'm a very frugal person, and I know a lot of you finance orientated people will
					be just the same! That's why the pricing for the subscription plans is as 
					low as it can be whilst still allowing me to procure reliable, accurate stock data -- which is very expensive! 
					By keeping the prices low, I hope to help my fellow investors with small to mid-sized portfolios. Because you shouldn't
					have to pay for expensive portfolio tracking software! <i class="far fa-smile"></i>
				</small>
			</div>
		</div>

	</div>


	<p class="my-5">
		<div class="d-flex mb-3">
			<div class="float-start">
				<img src="/images/stripe.png" alt="" width="100px">
			</div>
			<p class="text-dark pl--12 pr--12">
				<span>
					<i class="fas fa-info-circle text-primary"></i> All payments and card details are handled by Stripe. 
					<br> You can learn about how Stripe securely handles your data 
					<a href="https://stripe.com/docs/security/stripe" target="_blank" class="font-weight-bold">here</a>
				</span>
			</p>
		</div>
	</p>

</div>

<div v-else>

	<b-button @click="back" :disabled="loading"><i class="fas fa-arrow-left"></i> Choose a different plan</b-button>

	<payment-form :intent="'{{ $intent->client_secret }}'" :plan="selectedPlan" :stripe-key="'{{ env("STRIPE_KEY") }}'"></payment-form>

</div>

@endsection