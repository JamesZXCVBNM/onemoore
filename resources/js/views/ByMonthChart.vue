<template>
	<div>
		<line-chart :chart-data="datacollection" :styles="{ height: '200px', position: 'relative'}"></line-chart>
	</div>
</template>

<script>
	import LineChart from '../components/LineChart'

	export default {
		props: ['data'],
		name: 'ByMonthChart',
		data() {
			return {
				datacollection: null
			}
		},
		components: {
			LineChart,
		},
		created() {
			let labels = []
			let values = []
			this.data.forEach((v,k) => {
				labels.push(moment().month(k).format('MMM'))
				values.push(v)
			})
			this.datacollection = { 
				labels: labels,
				datasets: [{
					borderColor: 'rgb(110,27,35)',
					backgroundColor: 'rgba(110,27,35, 0.3)',
					borderWidth: 2,
					pointBackgroundColor: '#fff',
					pointBorderColor: '#000',
					pointRadius: 8,
					pointHitRadius: 10,
					lineTension: 0.2,
					data: values
				}]
			}
		}
	}

</script>
