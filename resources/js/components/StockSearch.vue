<template>
	<div>
		<b-form-group description="search and then click the stock in the results below">
			<b-input-group>
				<b-form-input ref="searchField" v-model="value" placeholder="Search by Ticker (e.g. AAPL, AZN.L)" autofocus></b-form-input>
				<b-input-group-append>
					<b-button @click="search">Search</b-button>
				</b-input-group-append>
			</b-input-group>
		</b-form-group>
		<b-table 
			:items="results"
			:fields="fields"
			thead-class="hide"
			class="cursor-pointer"
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
			value: null,
			results: [],
			fields: [{key: 'logo'}, {key: 'ticker'}, {key: 'name'}],
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
				axios.get(`/symbols`, {
					params: {
						query: this.value
					}
				}).then(response => {
					this.results = response.data
				})
			}
		}, 250),
		select(row) {
			this.$emit('selected', row)
		}
	},
	created() {
		this.$refs.searchField.focus()
	}
}
</script>