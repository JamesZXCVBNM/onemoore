@extends('layouts.app')

@section('scripts')

<script src="{{ mix('js/account.js') }}"></script>

@endsection

@section('content')

<page-title :title="'Account'"></page-title>

@if (sizeof(Auth::user()->subscriptions))
	{{-- <p>You're Subscribed! <i class="far fa-smile"></i></p> --}}
@else

	@include('components.subscribe-link')

@endif

<b-card no-body v-cloak>
	<b-tabs vertical card pills active-nav-item-class="bg-secondary text-white" nav-wrapper-class="bg-light">
	
		<b-tab title="Settings" active>
			<b-form-group label="Portfolio Sharing" label-class="font-weight-bold" description="Allow other users to view your Portfolio">
				<b-form-checkbox v-model="sharing" name="check-button" switch size="lg" value="1" :unchecked-value="0" :disabled="saving" @change="updateProfileSharing">
					<span v-text="sharing ? 'On' : 'Off'"></span>
				</b-form-checkbox>
			</b-form-group>

			<hr>

			<b-form-group label="Base Currency" label-class="font-weight-bold" description="Unless otherwise stated, all currency values will be show as this currency.">
				<b-form-select :options="['GBP', 'USD']" style="max-width: 200px" v-model="currency" @change="updateCurrency" :disabled="saving"></b-form-select>
			</b-form-group>
		</b-tab>

		<b-tab title="Your Subscription">

			<div v-if="user">
				<div v-if="user.subscription">
					<p><strong>Plan: </strong><span v-text="user.subscription.name"></span></p>
					<p><strong>Status: </strong><span v-text="user.subscription.status"></span></p>
					<p><strong>Started: </strong><span v-text="moment(user.subscription.created_at).format('Do MMM YYYY')"></span></p>

					@if (Auth::user()->subscriptions->first())
					<a href="{{ route('cashier.payment', Auth::user()->subscriptions->first()->latestPayment()->id) }}">
						Check the status of your last payment.
					</a>
					@endif

					<hr>

					<b-card class="border-danger">
						<div v-if="!user.subscription.ends_at">
							<b-form-group 
								description="Your subscription will remain active until the end of your current billing period."
								label="End your subscription"
							>
								<b-button variant="danger" @click="cancelSubscription">Cancel Subscription</b-button>
							</b-form-group>
						</div>
						<div v-else>
							<p>You have cancelled your automatic renewal</p>
							<strong>Subscription Ending: </strong><span v-text="moment(user.subscription.ends_at).format('Do MMM YYYY')"></span>
						</div>
					</b-card>
				</div>
				<div v-else>
					<p>You are not subscribed. Why not take a look the plans?</p>
					<b-button href="/plans" variant="primary">View Plans</b-button>
				</div>
			</div>

		</b-tab>
	
		<b-tab title="Change Password">		
			<b-form-group label="Old Password">
				<b-form-input type="password"></b-form-input>
			</b-form-group>
			<b-form-group label="New Password">
				<b-form-input type="password"></b-form-input>
			</b-form-group>
			<b-form-group label="Confirm Password">
				<b-form-input type="password"></b-form-input>
			</b-form-group>
			<b-button variant="primary">Submit</b-button>
		</b-tab>
		<b-tab title="Update Payment Details">
			<span class="d-block text-muted font-weight-medium mb-3">
				<i class="fas fa-credit-card mr-2"></i> Update Payment Details
			</span>
		</b-tab>
	
	</b-tabs>
</b-card>


@endsection
