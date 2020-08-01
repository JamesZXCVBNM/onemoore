<script>
import { Line } from 'vue-chartjs'
export default {
	extends: Line,
	props: ['chartData'],
	data() {
		return {
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						},
						gridLines: {
							display: true
						}
					}],
					xAxes: [{
						gridLines: {
							display: true
						}
					}]
				},
				legend: {
					display: false
				},
				responsive: true,
				maintainAspectRatio: false,
			}
		}
	},
	mounted() {
		this.renderChart(this.chartData, this.options)
	}
} 
</script>
