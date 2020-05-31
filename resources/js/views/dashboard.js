new Vue({
	el: '#middle',
	data: {
		search: '',
		portfolio: [],
		visibleRows: [],
		tables: {
			portfolio: {
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
		}
	},
	// computed: {
	// },
	// methods: {
	// 	total(col) {
	// 		let map = this.visibleRows.map(x => x.monthly[col] ? x.monthly[col].total : 0)
	// 		return map.reduce((accum, x) => accum + parseFloat(x), 0.00)
	// 	},
	// },
	// created() {
	// 	axios.get('/my-portfolio').then(response => {
	// 		this.portfolio = response.data.data
	// 	})
	// }
})