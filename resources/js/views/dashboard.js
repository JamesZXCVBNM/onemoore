new Vue({
	el: '#middle',
	data: {
		search: '',
		portfolio: [],
		monthlyDividends: [],
		sectorBreakdown: [],
		// barChartData: [],
		selectedMonth: moment().month()
	},
	computed: {
		total() {
			let t = 0
			this.portfolio.forEach(x => t += (x.converted_quote * x.quantity))
			return t.toFixed(2)
		},
		growth() {
			let t = 0
			this.portfolio.forEach(x => t += (x.converted_cost * x.quantity))
			return (this.total - t).toFixed(2)
		},
		month() {
			let data = []
			for (let i = 0; i < 12; i++) {		
				this.portfolio.forEach(position => {
					if (position.monthly['month' + (i + 1)]) {
						if (i == this.selectedMonth) data.push(position)
					}
				})
			}
			return data
		}
	},
	methods: {
		loadPortfolio() {
			this.loadingPortfolio = true
			return axios.get('/my-portfolio').then(response => {
				this.portfolio = response.data.data
				this.loadingPortfolio = false
				this.getMonthlyDividends()
				this.getValueBySector()
			})
		},
		getMonthlyDividends() {
			let months = []
			// let data = []
			for (let i = 0; i < 12; i++) {		
				let total = 0
				this.portfolio.forEach(position => {
					if (position.monthly['month' + (i + 1)]) {
						total += position.monthly['month' + (i + 1)].user_currency
						// if (i == 5) data.push(position)
					}
				})
				months[i] = total.toFixed(2)
			}
			this.monthlyDividends = months
			// this.barChartData = data
		},
		getValueBySector() {
			let sectors = {}
			this.portfolio.forEach(position => {
				if (position.industry) {
					sectors[position.industry.name] = 0
				} 
			})
			this.portfolio.forEach(position => {
				if (position.industry) {
					sectors[position.industry.name] += (position.converted_quote * position.quantity)
				} 
			})
			this.sectorBreakdown = sectors
		}
	},
	created() {
		this.loadPortfolio()	
	}
})