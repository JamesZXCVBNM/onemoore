<template>
	<div>
		<b-card class="border-0">

			<b-button 
				size="sm" 
				class="btn-dark btn-soft mb-3" 
				@click="showAddPosition = !showAddPosition"
			> 
				<i class="fas" :class="showAddPosition ? 'fa-times-circle' : 'fa-plus-circle'"></i> 
				{{ showAddPosition ? 'Cancel'  : 'Add Position' }}
			</b-button>

			<span v-if="showSaveMessage" class="h6 text-success ml-2"><i class="fas fa-check"></i> Saved!</span>

			<b-collapse id="collapse-1" v-model="showAddPosition">
				<b-card class="mx-3 mb-3">
					<new-position @saved="positionAdded"></new-position>
				</b-card>
			</b-collapse>
			
			<b-table 
				v-model="visibleRows" 
				:items="portfolio" 
				:fields="fields" 
				:busy="loadingPortfolio"
				class="mb-0" 
				bordered
				hover
				tbody-class="cursor-pointer"
				thead-class="thead-light"
				@row-clicked="rowClicked"
			>
				<template v-slot:cell(symbol.ticker)="d">
					<span v-text="d.item.symbol.ticker" v-b-popover.hover="d.item.symbol.name" class="cursor-help"></span>
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
				<!-- <template slot="top-row" v-if="portfolio.length > 8">
					<b-td colspan="3" class="text-align-end font-weight-bold">Total:</b-td>
					<b-td v-for="i in 12" :key="i">
						<span v-text="total('month' + i).toFixed(2)"></span>
					</b-td>
				</template> -->
			</b-table>
			<b-modal id="my-modal" size="lg"  centered lazy>
				<template v-slot:modal-header="{ close }">
					Update: {{ selected ? selected.symbol.ticker : '' }}
				</template>
				<div v-if="selected">
					<b-form-group label="Quantiy" label-cols="3">
						<b-form-input v-model="selected.quantity"></b-form-input>
					</b-form-group>
					<b-form-group label="Price" label-cols="3">
						<b-form-input v-model="selected.price"></b-form-input>
					</b-form-group>
				</div>
			</b-modal>
		</b-card>
	</div>
</template>
<script>
export default {
	data() {
		return {
			showSaveMessage: false,
			showAddPosition: false,
			selected: null,
			portfolio: [],
			visibleRows: [],
			fields: [
				{ key: 'logo', label: '', class: 'w--1' },
				{ key: 'symbol.ticker', label: 'Ticker', class: '' },
				{ key: 'quantity', label: 'Units' },
				{ key: 'monthly.month1.total', label: 'JAN', class: 'w--1' },
				{ key: 'monthly.month2.total', label: 'FEB', class: 'w--1' },
				{ key: 'monthly.month3.total', label: 'MAR', class: 'w--1' },
				{ key: 'monthly.month4.total', label: 'APR', class: 'w--1' },
				{ key: 'monthly.month5.total', label: 'MAY', class: 'w--1' },
				{ key: 'monthly.month6.total', label: 'JUN', class: 'w--1' },
				{ key: 'monthly.month7.total', label: 'JUL', class: 'w--1' },
				{ key: 'monthly.month8.total', label: 'AUG', class: 'w--1' },
				{ key: 'monthly.month9.total', label: 'SEP', class: 'w--1' },
				{ key: 'monthly.month10.total', label: 'OCT', class: 'w--1' },
				{ key: 'monthly.month11.total', label: 'NOV', class: 'w--1' },
				{ key: 'monthly.month12.total', label: 'DEC', class: 'w--1' },
			]
		}
	},
	methods: {
		total(col) {
			let map = this.visibleRows.map(x => x.monthly[col] ? x.monthly[col].total : 0)
			return map.reduce((accum, x) => accum + parseFloat(x), 0.00)
		},
		rowClicked(row) {
			this.selected = row
			this.$bvModal.show('my-modal')
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
		loadPortfolio() {
			this.loadingPortfolio = true
			return axios.get('/my-portfolio').then(response => {
				this.portfolio = response.data.data
				this.loadingPortfolio = false
			})
		},
	},
	created() {
		this.loadPortfolio()
	}
}
</script>