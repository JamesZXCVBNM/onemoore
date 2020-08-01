<script>
export default {
	props: ['data', 'month'],
	data() {
		return {
			fields: [
				{ key: 'logo', label: '', class: 'w--1 m-0 p-2' },
				{ key: 'symbol.ticker', label: 'Ticker' },
				{ key: 'quantity', label: 'Units' },
				{ key: 'dividends', label: 'Dividends' },
			]
		}
	}
}
</script>
<template>
	<div>
		<b-table :items="data" :fields="fields" bordered hover class="mb-0">
			<template v-slot:cell(logo)="d">
				<b-img-lazy :src="d.item.symbol.logo ? `https://static.finnhub.io/logo/${d.item.symbol.logo}` : '/images/anon.png'" alt="logo" width="30px"></b-img-lazy>
			</template>
			<template v-slot:cell(symbol.ticker)="d">
				<span v-text="d.item.symbol.ticker" class="cursor-help font-weight-bold" v-b-popover.hover="d.item.symbol.name"></span>
			</template>
			<template v-slot:cell(quantity)="d">
				<div class="text-align-end">
					<span v-text="d.item.quantity"></span>
				</div>
			</template>
			<template v-slot:cell(dividends)="d">
				<span v-text="d.item.monthly['month'+(parseInt(month)+1)].user_currency"></span>
			</template>
		</b-table>
	</div>
</template>