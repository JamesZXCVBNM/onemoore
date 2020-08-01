<template>
	<div>
		<b-table
			:items="portfolio"
			:fields="fields"
			:busy.sync="loading"
			class="mb-0" 
			bordered
			hover
			responsive
			tbody-class="cursor-pointer"
			thead-class="thead-light"
			@row-clicked="rowClicked"
		>
			<template v-slot:cell(logo)="d">
				<b-img-lazy :src="d.item.symbol.logo ? `https://static.finnhub.io/logo/${d.item.symbol.logo}` : '/images/anon.png'" alt="logo" width="30px"></b-img-lazy>
			</template>
			<template v-slot:cell(symbol.ticker)="d">
				<span v-text="d.item.symbol.ticker" class="font-weight-bold cursor-help" v-b-popover.hover="d.item.symbol.name"></span>
			</template>
			<template v-slot:cell(price)="d">
				<span v-text="d.item.price"></span>
				<small class="text-muted" v-text="d.item.symbol.currency"></small>
			</template>
			<template v-slot:cell(symbol.quote)="d">
				<span v-text="d.item.symbol.quote"></span>
				<small class="text-muted" v-text="d.item.symbol.currency"></small>
			</template>
			<template v-slot:cell(div_per_share)="d">
				<span v-text="(d.item.year_total / d.item.quantity).toFixed(2)"></span>
			</template>
			<template v-slot:cell(yoc)="d">
				<span v-text="calculateYOC(d.item) + '%'"></span>
			</template>
			<template v-slot:cell(yoq)="d">
				<span v-text="calculateYOQ(d.item) + '%'"></span>
			</template>
			<template v-slot:cell(gain)="d">
				<span v-text="calculateGain(d.item) + '%'" :class="'text-' + getClass(d.item.price, d.item.symbol.quote)"></span>
			</template>
		</b-table>
	</div>
</template>
<script>
export default {
	props: ['portfolio', 'loading'],
	data() {
		return {
			fields: [
				{ key: 'logo', label: '', class: 'w--1 m-0 p-2' },
				{ key: 'symbol.ticker', label: 'Stock', class: '' },
				{ key: 'quantity', label: 'Units' },
				{ key: 'price', label: 'Cost' },
				{ key: 'symbol.quote', label: 'Quote' },
				{ key: 'div_per_share', label: 'Div/Share (Base)' },
				{ key: 'yoc', label: 'Yield On Cost' },
				{ key: 'yoq', label: 'Yield On Quote' },
				{ key: 'gain', label: 'Gain / Loss' },
			],

		}
	},
	methods: {
		calculateYOC(position) {
			return (((position.year_total / position.quantity) / position.converted_cost) * 100).toFixed(1)
		},
		calculateYOQ(position) {
			return (((position.year_total / position.quantity) / position.converted_quote) * 100).toFixed(1)
		},
		calculateGain(position) {
			let diff =  position.symbol.quote - position.price
			return ((diff / position.price) * 100).toFixed(0)
		},
		getClass(a, b) {
			return parseFloat(a) < parseFloat(b) ? 'success' : 'danger'
		},
		rowClicked(row) {
			this.$emit('selected', row)
		}
	}
}
</script>