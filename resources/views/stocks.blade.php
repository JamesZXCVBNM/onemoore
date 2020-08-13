@extends('layouts.app')

@section('scripts')
	<script src="{{ mix('js/stocks.js') }}"></script>
@endsection

@section('content')

	<div v-if="!selectedStock">
		<p>This will show all of the information currently held on the stocks in the database</p>
		<search @selected="selected"></search>
	</div>

	<div v-else v-cloak>

		<b-button @click="selectedStock = null"><i class="fas fa-arrow-circle-left"></i> Search again</b-button>

		<span class="h5 d-block font-weight-medium my-3">
			Details
		</span>
		<b-card no-body class="mb-4">
			{{-- <span v-text="selectedStock"></span> --}}

			<b-row :no-gutters="true">
				<b-col md="9">
					<table class="table table-striped mb-0">
						<tbody>
							<tr>
								<th class="text-muted">Ticker</th>
								<td v-text="selectedStock.ticker"></td>
							</tr>
							<tr>
								<th class="text-muted">Name</th>
								<td v-text="selectedStock.name"></td>
							</tr>
							<tr>
								<th class="text-muted">Exchange</th>
								<td v-text="selectedStock.exchange.name"></td>
							</tr>
							<tr>
								<th class="text-muted">Sector</th>
								<td v-text="details ? details.sector.name : ''"></td>
							</tr>
							<tr>
								<th class="text-muted">Industry</th>
								<td v-text="details ? details.sector.industry.name : ''"></td>
							</tr>
							<tr>
								<th class="text-muted">Last Quote</th>
								<td>
									<span v-if="details">@{{ details.quote }} <small>@{{ details.currency }}</small></span>
								</td>
							</tr>
						</tbody>
					</table>
				</b-col>
				<b-col md="3" class="d-middle">
					<b-img 
						:src="selectedStock.logo ? `https://static.finnhub.io/logo/${selectedStock.logo}` : '/images/anon.png'" 
						alt="company logo"
					>
				</b-col>
			</b-row>
		</b-card>

		<span class="h5 d-block font-weight-medium my-3">
			Dividends
		</span>
		<b-card v-if="details" no-body>
			<div v-if="!details.dividends.length" class="p-3">
				<p>
					We don't currently have any dividend data for this stock.
					There could be a few reasons for this:
				</p>
				<ul>
					<li>Dividend data is only loaded for stocks that are in at least one portfolio</li>
					<li>Some stocks do not pay dividends</li>
					<li>Our data provider does not have the dividend data</li>
				</ul>
			</div>
			<b-table
				v-else 
				:items="details.dividends" 
				:fields="fields"
				:current-page="currentPage"
				:per-page="perPage"
				:sort-by="'pay_date'"
				:sort-desc="true"
				striped
				class="mb-0"
				thead-class="text-muted"
			>
				<template v-slot:cell(amount)="row">
					<span v-text="Number.parseFloat(row.item.amount).toFixed(2)"></span>
					<small v-text="details.currency"></small>
				</template>
			</b-table>
			<b-pagination v-if="totalRows > perPage" v-model="currentPage" :total-rows="totalRows" :per-page="perPage" class="pt-3 px-3"></b-pagination>
		</b-card>
	</div>

@endsection