<template>
	<div class="border-bottom border-light">
		<div class="d-flex align-items-center p-3 border-left bw--3" :class="'border-'+border">
			<div class="flex-none w--30">
				<label class="form-checkbox form-checkbox-primary form-checkbox-inset">
					<input type="checkbox" name="item_id[]" value="3">
					<i></i>
				</label>
			</div>
			<div class="flex-fill line-height-1">
				<span class="text-muted">
					{{ task }}
				</span>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	props: ['task', 'border']
}
</script>