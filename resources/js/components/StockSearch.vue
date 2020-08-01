<template>
	<div>
		<b-form-group description="search and then click the stock in the results below"  class="mb-0">
			<b-input-group  class="mb-0">
				<b-input-group-prepend>
					<b-input-group-text>
						<i class="fas fa-spinner fa-spin" v-if="loading && value"></i>
						<i class="fas fa-search" v-else></i>
					</b-input-group-text>
				</b-input-group-prepend>
				<b-form-input ref="searchField" v-model="value" placeholder="Search by Ticker (e.g. AAPL, AZN)" autofocus></b-form-input>
			</b-input-group>
		</b-form-group>
		<b-table 
			:items="results"
			:fields="fields"
			thead-class="hide"
			class="cursor-pointer mb-0"
			hover
			outlined
			@row-clicked="select"
		>
			<template v-slot:cell(logo)="data">
				<b-img-lazy :src="data.item.logo ? `https://static.finnhub.io/logo/${data.item.logo}` : `/images/anon.png`" alt="logo" width="24px"></b-img-lazy>
			</template>
		</b-table>
	</div>
</template>
<script>
export default {
	data() {
		return {
			loading: false,
			value: null,
			results: [],
			fields: [{key: 'logo'}, {key: 'ticker'}, {key: 'name'}, {key: 'exchange.code'}],
		}
	},
	watch: {
		value() {
			this.search()
		}
	},
	methods: {
		search: _.debounce(function() {
			if (this.value) {
				this.loading = true
				axios.get(`/symbols`, {
					params: {
						query: this.value
					}
				}).then(response => {
					this.results = response.data.data
					this.loading = false
				})
			}
		}, 250),
		select(row) {
			this.$emit('selected', row)
		}
	},
	mounted() {
		this.$refs.searchField.focus()
	}
}
</script>