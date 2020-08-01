new Vue({
	el: '#middle',
	data: {
		search: '',
		portfolio: [],
		loadingPortfolio: false,
		selectedPosition: null,
		loading: false,
		showAddPosition: false,
	},
	methods: {
		loadPortfolio() {
			this.loadingPortfolio = true
			return axios.get('/my-portfolio').then(response => {
				this.portfolio = response.data.data
				this.loadingPortfolio = false
			})
		},
		positionSelected(position) {
			this.selectedPosition = position
			this.$bvModal.show('edit-position-modal')
		},
		positionAdded() {
			this.loadPortfolio()
			setTimeout(() => {
				this.loadPortfolio()
			}, 5000)
		},
		updatePosition() {
			this.loading = true
			axios.post(`/positions/${this.selectedPosition.id}?_method=PATCH`, {
				quantity: this.selectedPosition.quantity,
				price: this.selectedPosition.price
			}).then(response => {
				this.loading = false
				this.$bvModal.hide('edit-position-modal')
				this.loadPortfolio()
			}).catch(err => {
				this.loading = false
				console.log(err)
			})
		},
		deletePosition() {
			this.loading = true
			axios.post(`/positions/${this.selectedPosition.id}?_method=DELETE`).then(() => {
				this.$bvModal.hide('edit-position-modal')
				this.loading = false
				this.loadPortfolio()
			}).catch(err => {
				this.loading = false
				console.log(err)
			})
		}
	},
	created() {
		this.loadPortfolio()	
	}
})