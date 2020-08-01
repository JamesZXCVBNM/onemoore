import toastr from 'toastr'
toastr.options.positionClass = 'toast-bottom-right'
new Vue({
	el: '#middle',
	data: {
		saving: false,
		user: null,
		sharing: null,
		currency: null,
	},
	methods: {
		cancelSubscription() {
			axios.post(`/subscriptions/${this.user.subscription.id}?_method=DELETE`).then(response => {
				// location.reload()
			})
		},
		updateProfileSharing() {
			this.saving = true
			this.$nextTick(() => {
				axios.post(`/users/${this.user.id}?_method=PATCH`, {
					is_shared: this.sharing
				}).then(() => {
					this.saving = false
					toastr.success('Setting Updated --> ' + (this.sharing ? 'ON' : 'OFF'))
				})
			})
		},
		updateCurrency() {
			this.saving = true
			this.$nextTick(() => {
				axios.post(`/users/${this.user.id}?_method=PATCH`, {
					currency: this.currency
				}).then(() => {
					this.saving = false
					toastr.success('Setting Updated --> ' + this.currency)
				})
			})
		}
	},
	created() {
		axios.get(`/user`).then(response => {
			this.user = response.data.data
			this.sharing = this.user.is_shared
			this.currency = this.user.currency
		})
	}
}) 