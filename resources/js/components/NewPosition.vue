<template>
	<div>
		<b-form-group>	
			<stock-search v-if="!stock" @selected="stockSelected"></stock-search>
			<b-input-group v-else>
				<b-form-input v-model="stock.name" disabled></b-form-input>
				<b-input-group-append>
					<b-button @click="stock = null"><i class="fas fa-times m-0"></i></b-button>
				</b-input-group-append>
			</b-input-group>
		</b-form-group>
		<div v-if="stock">
			<div class="form-row">
				<div class="col">
					<b-form-group label="Quantity" description="the number of shares you own, minimum: 0.0001">
						<input type="number" class="form-control" placeholder="Quantity" v-model="quantity" min="0.0001" step="1">
						<!-- <b-form-input v-model="quantity" class="form-control" placeholder="Quantity" number></b-form-input> -->
					</b-form-group>
				</div>
				<div class="col">
					<b-form-group :label="`Price in ${stock.currency}`" :description="`the average price of your owned shares in ${stock.currency}`">
						<input type="number" class="form-control" placeholder="Price" v-model="price" min="0.01">
					</b-form-group>
				</div>
			</div>
			<div class="form-group">
				<button class="btn btn-danger" :disabled="!stock || !quantity || !price" @click="save">Add To Portfolio</button>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	data() {
		return {
			stock: null,
			quantity: null,
			price: null,
		}
	},
	methods: {
		stockSelected(stock) {
			this.stock = stock
		},
		save() {
			axios.post('positions', {
				symbol_id: this.stock.id,
				quantity: this.quantity,
				price: this.price,
			}).then(response => {
				this.$emit('saved')
				this.stock = this.quantity = this.price = null
			}).catch(err => {
				console.log(err)
			})
		}
	},
}
</script>