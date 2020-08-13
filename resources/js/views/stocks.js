import Search from '../components/StockSearch'
new Vue({
	el: '#middle',
	components: { Search },
	data: {
		selectedStock: null,
		details: null,
		perPage: 10,
		currentPage: 1,
		totalRows: 0,
		fields: [
			{ key: 'amount', sortable: true },
			{ key: 'ex_date', sortable: true },
			{ key: 'record_date', sortable: true },
			{ key: 'declaration_date', sortable: true },
			{ key: 'pay_date', sortable: true },
		]
	},
	watch: {
		selectedStock(x) {
			axios.get(`/symbols/${x.id}`).then(response => {
				this.details = response.data
				this.totalRows = this.details.dividends.length
			})
		}
	},
	methods: {
		selected(item) {
			this.selectedStock = item
		},
	},
})