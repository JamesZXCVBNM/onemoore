<template>
	<div>
		<pie-chart :chart-data="datacollection"  v-if="datacollection"></pie-chart>
	</div>
</template>

<script>
	import PieChart from '../components/PieChart'

	export default {
		props: ['chartData'],
		name: 'BySectorPie',
		data() {
			return {
				datacollection: null
			}
		},
		components: {
			PieChart,
		},
		watch: {
			chartData() {
				let labels = []
				let values = []

				let entries = Object.entries(this.chartData)
				let sorted = entries.sort((a, b) => b[1] - a[1]);
				for (let [k, v] of sorted) {
					labels.push(k)
					values.push(v)
				}
	
				this.datacollection = { 
					labels: labels,
					datasets: [{
						data: values,
						backgroundColor: ["#003f5c", "#2f4b7c", "#665191", "#a05195", "#d45087", "#f95d6a", "#ff7c43", "#ffa600", "#44AF44"],
						borderWidth: 2,
						weight: 2,
						hoverBorderColor: '#F9F9FC',
					}]
				}
			}
		},
		created() {
		}
	}

</script>
