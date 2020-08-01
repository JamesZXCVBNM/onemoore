new Vue({
	el: '#middle',
	data: {
		loading: false,
		selectedPlan: null,
		session: null,
	},
	methods: {
		planSelected(plan) {
			axios.get(`/plans/${plan}`).then(response => {
				this.selectedPlan = response.data
			})
		},
		back() {
			this.selectedPlan = null
		}
	},
	created() {
		
	}
}) 