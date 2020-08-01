<template>
	<div>			
		<b-table 
			v-model="visibleRows" 
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
			<template v-slot:cell(symbol.ticker)="d">
				<span v-text="d.item.symbol.ticker" class="cursor-help font-weight-bold" v-b-popover.hover="d.item.symbol.name"></span>
			</template>
			<template v-slot:cell(quantity)="d">
				<div class="text-align-end">
					<span v-text="d.item.quantity"></span>
				</div>
			</template>
			<template v-slot:cell(logo)="d">
				<b-img-lazy :src="d.item.symbol.logo ? `https://static.finnhub.io/logo/${d.item.symbol.logo}` : '/images/anon.png'" alt="logo" width="30px"></b-img-lazy>
			</template>
			<template slot="custom-foot">
				<b-tr style="border-top: 2px solid #E9ECEF !important">
					<b-td colspan="3" class="text-align-end font-weight-bold">Total:</b-td>
					<b-td v-for="i in 12" :key="i">
						<span v-text="total('month' + i).toFixed(2)"></span>
					</b-td>
				</b-tr>
			</template>
		</b-table>
	</div>
</template>
<script>
export default {
	props: ['loading', 'portfolio'],
	data() {
		return {
			showSaveMessage: false,
			showAddPosition: false,
			visibleRows: [],
			fields: [
				{ key: 'logo', label: '', class: 'w--1 m-0 p-2' },
				{ key: 'symbol.ticker', label: 'Ticker', class: '' },
				{ key: 'quantity', label: 'Units' },
				{ key: 'monthly.month1.user_currency', label: 'JAN', },
				{ key: 'monthly.month2.user_currency', label: 'FEB', },
				{ key: 'monthly.month3.user_currency', label: 'MAR', },
				{ key: 'monthly.month4.user_currency', label: 'APR', },
				{ key: 'monthly.month5.user_currency', label: 'MAY', },
				{ key: 'monthly.month6.user_currency', label: 'JUN', },
				{ key: 'monthly.month7.user_currency', label: 'JUL', },
				{ key: 'monthly.month8.user_currency', label: 'AUG', },
				{ key: 'monthly.month9.user_currency', label: 'SEP', },
				{ key: 'monthly.month10.user_currency', label: 'OCT', },
				{ key: 'monthly.month11.user_currency', label: 'NOV', },
				{ key: 'monthly.month12.user_currency', label: 'DEC', },
			]
		}
	},
	methods: {
		total(col) {
			let map = this.visibleRows.map(x => x.monthly[col] ? x.monthly[col].user_currency : 0)
			return map.reduce((accum, x) => accum + parseFloat(x), 0.00)
		},
		rowClicked(row) {
			this.$emit('selected', row)			
		},
		positionAdded() {
			this.showAddPosition = false
			this.showSaveMessage = true
			this.loadPortfolio()
			setTimeout(() => {
				this.showSaveMessage = false
				this.loadPortfolio()
			}, 6000)
		},
	},
	created() {
		// this.loadPortfolio()
	}
}
</script>