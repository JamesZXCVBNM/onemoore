@extends('layouts.app')

@section('scripts')
	<script src="{{ mix('js/dashboard.js') }}"></script>
@endsection

@section('content')

	<!-- PAGE TITLE -->
	<page-title :title="'Dashboard'"></page-title>

	@if(session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div>
	@endif

	@if (session('status'))
		<div class="alert alert-success" role="alert">
			{{ session('status') }}
		</div>
	@endif

	{{-- SUBSCRIBE LINK --}}
	@if (!Auth::user()->subscribed('default'))
		@include('components.subscribe-link')
	@endif

	{{-- <div class="row gutters-sm">
		<div class="col-12 col-md-6 col-xl-4 mb-3">
			<div class="bg-white shadow-md text-dark p-5 rounded text-center">
				<h3 class="fs--20 mt-2">This Month</h3>
				<p class="display-5">£86.33</p>
			</div>
		</div>
		<div class="col-12 col-md-6 col-xl-4 mb-3">
			<div class="bg-white shadow-md text-dark p-5 rounded text-center">	
				<h3 class="fs--20 mt-2">Next Month</h3>
				<p class="display-5">£55.24</p>
			</div>
		</div>
		<div class="col-12 col-md-6 col-xl-4 mb-3">
			<div class="bg-white shadow-md text-dark p-5 rounded text-center">	
				<h3 class="fs--20 mt-2">This Year</h3>
				<p class="display-5">£55.24</p>
			</div>
		</div>
	</div> --}}

	{{-- <b-row class="my-5">
		<b-col v-for="i in 12" lg="2">
			<b-card>
				@{{ moment('YYYY-' + i + '-01').format('MMM') }}
			</b-card>
		</b-col>
	</b-row> --}}


	<div v-cloak>
		{{-- BY MONTH LINE CHART --}}
		<b-card class="my-4">
			<span class="d-block text-muted text-truncate font-weight-medium mb-3">
				Dividends By Month
			</span>
	
			<by-month-chart v-if="monthlyDividends.length" :data="monthlyDividends"></by-month-chart>
	
			<table class="table table-bordered table-sm mb-0 mt-3 fs--14 text-center">
				<thead class="thead-light">
					<tr>
						<th v-for="(value, key) in monthlyDividends" v-text="moment().month(key).format('MMM')" class="text-uppercase"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td v-for="(value, key) in monthlyDividends" v-text="value"></td>
					</tr>
				</tbody>
			</table>
		</b-card>
	
		<b-card>
			<span class="d-block text-muted text-truncate font-weight-medium mb-3">
				{{-- This Month --}}
				<b-form-group label="Month: " label-cols="2">
					<b-form-select class="form-control form-control-clean" v-model="selectedMonth">
						<b-form-select-option
							v-for="i in 12" 
							:value="i" 
							v-text="moment().month(i).format('MMM')"
						></b-form-select-option>
					</b-form-select>
				</b-form-group>
			</span>
			<div class="portlet">
				<div class="portlet-body max-h-300 tab-content p-0">
					<div class="max-h-300 scrollable-vertical scrollable-styled-dark align-self-baseline h-100 max-h-300 w-100">
						<month-breakdown-table 
							v-if="selectedMonth && month"
							:data="month" 
							:month="selectedMonth"
						></month-breakdown-table>
					</div>
				</div>
			</div>
		</b-card>
	
		<b-row>
			<b-col>
				<b-card class="my-4">
					<span class="d-block text-muted text-truncate font-weight-medium mb-3">
						Portfolio Diversification
					</span>
					<by-sector-pie :chart-data="sectorBreakdown" v-if="sectorBreakdown"></by-sector-pie>
				</b-card>
			</b-col>
			<b-col>
				<b-card class="my-4">
					<span class="d-block text-muted text-truncate font-weight-medium mb-3">
						Portfolio Value
					</span>
					<div class="d-flex justify-content-center">
						<span class="mb-0 mt-3 h3">£</span>
						<span class="mb-0 display-4" v-text="total"></span>
					</div>
				</b-card>
				<b-card class="my-4">
					<span class="d-block text-muted text-truncate font-weight-medium mb-3">
						Portfolio Gains
					</span>
					<div class="d-flex justify-content-center">
						<span class="mb-0 mt-3 h3">£</span>
						<span class="mb-0 display-4" v-text="growth"></span>
					</div>
				</b-card>
				{{-- <b-card class="my-4">
					<span class="d-block text-muted text-truncate font-weight-medium mb-3">
						Add To Portfolio
					</span>
					<new-position @saved="positionAdded"></new-position>
				</b-card> --}}
			</b-col>
		</b-row>
	</div>


@endsection
