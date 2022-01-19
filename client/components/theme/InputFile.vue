<template>
	<input
		class="visually-hidden"
		type="file"
		ref="input"
		:name="name"
		:multiple="multiple"
	>
</template>

<script>

	export default {
		props: {
			name: String,
			multiple: { type: Boolean, default: false }
		},
	}

</script>
