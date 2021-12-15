<template>
	<div>
		<label>
			<span class="block">
				<slot name="label"></slot>
			</span>
			<input class="block w-full" :type="type" :name="name" v-if="type != 'textarea'">
			<textarea class="block w-full" v-else :name="name"></textarea>
			<hr class="w-full h-px bg-gray-600">
		</label>
	</div>
</template>

<script>

	export default {
		props: {
			type: String,
			name: String
		}
	}

</script>
