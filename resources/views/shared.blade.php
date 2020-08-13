@extends('layouts.app')

@section('scripts')
	<script src="{{ mix('js/shared.js') }}"></script>
@endsection

@section('content')

<b-spinner v-if="loading"></b-spinner>

<b-card title="Shared Portfolios" v-if="!selectedUser && !loading">
	<b-table 
		:items="users" 
		:fields="['username', 'portfolio']"
		hover
		@row-clicked="showPortfolio"
	>
		<template v-slot:cell(portfolio)="row">
			@{{ row.item.portfolio.length }}
		</template>
	</b-table>
</b-card>

<div v-if="selectedUser">

	<b-button @click="selectedUser = null" class="mb-3">
		<i :class="`fas fa-arrow-circle-left`"></i> <span v-text="'Back'"></span>
	</b-button>

	<b-card no-body>
		<b-tabs card>
			<b-tab title="Details">
				<detail-table :portfolio="selectedUser.portfolio"></detail-table>
			</b-tab>
			<b-tab title="Dividends">
				<dividend-table :portfolio="selectedUser.portfolio"></dividend-table>
			</b-tab>
		</b-tabs>
	</b-card>
</div>

@endsection