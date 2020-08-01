@extends('layouts.app')

@section('scripts')
	<script src="{{ mix('js/portfolio.js') }}"></script>
@endsection

@section('content')

<page-title :title="'Portfolio'"></page-title>

<b-button variant="success" size="sm+" @click="showAddPosition = true" v-if="!showAddPosition"><i class="fas fa-plus"></i> Add New Position</b-button>

<b-card class="my-4" header="Add New Position" v-if="showAddPosition">
	<template slot="header">
		<span v-b-popover.hover.top="'Close'" class="cursor-pointer" @click="showAddPosition = false"><i class="fas fa-times mr-2"></i></span> Add New Position
	</template>
	<new-position @saved="positionAdded"></new-position>
</b-card>

<b-card class="my-4" no-body>
	<b-tabs card pills active-nav-item-class="bg-dark text-white" nav-wrapper-class="bg-light">
		<b-tab title="Details" class="p-0">
			<detail-table :portfolio="portfolio" :loading="loading" @selected="positionSelected"></detail-table>
		</b-tab>
		<b-tab title="Dividends" class="p-0">
			<dividend-table :portfolio="portfolio" :loading="loading" @selected="positionSelected"></dividend-table>
		</b-tab>
	</b-tabs>
</b-card>

<div class="text-center px-7">
	<small>
		<i class="fas fa-info mr-2"></i>
		Please remember that dividend figures can only ever be predictions.
		Dividend data is based on last year's dividends. Some companies may 
		have suspended or reduced their dividends whilst others will have 
		increased them.
	</small>
</div>

<b-modal id="edit-position-modal" size="lg" centered lazy hide-footer>
	<template v-slot:modal-header="{ close }">
		<span v-if="selectedPosition">
			<img :src="selectedPosition.symbol.logo ? `https://static.finnhub.io/logo/${selectedPosition.symbol.logo}` : '/images/anon.png'" alt="logo" class="mr-2" width="40px">
			<strong class="mr-2">@{{ selectedPosition.symbol.ticker }}</strong>
			@{{ selectedPosition.symbol.name }}
		</span>
		<b-button size="sm" variant="light" @click="close()">
			<i class="fas fa-times m-0"></i>
		</b-button>
		
	</template>
	<div v-if="selectedPosition">
		<b-form-group label="Quantity" label-cols="3" description="Fractional shares supported up to 4 decimal places">
			<b-form-input v-model="selectedPosition.quantity"></b-form-input>
		</b-form-group>
		<b-form-group label="Price" label-cols="3" :description="'Enter currency in: ' + selectedPosition.symbol.currency">
			<b-form-input v-model="selectedPosition.price"></b-form-input>
		</b-form-group>
		<b-form-group label="" label-cols="3">
			<b-button variant="success" @click="updatePosition" :disabled="loading">Save Changes</b-button>
			<b-button variant="danger" class="float-right" @click="deletePosition" :disabled="loading">Delete Position</b-button>
		</b-form-group>
	</div>
</b-modal>

@endsection