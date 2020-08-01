<script>
import { Pie } from 'vue-chartjs'
export default {
	extends: Pie,
	props: ['chartData'],
	data() {
		return {
			options: {
				layout: {
					padding: {
						top: 0,
						bottom: 0,
					}
				},
				legend: {
					position: 'left'
				}
			}
		}
	},
	mounted() {
		this.renderChart(this.chartData, this.options)
	}
} 
</script>
