<template>
	<div>
		{{ error.message }}
	</div>
</template>

<script>

export default {
	props: ['error'],
	layout: 'survey'
}

</script>
