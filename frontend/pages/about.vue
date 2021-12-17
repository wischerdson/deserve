<template>
	<div>
		<div class="page-background" ref="videoBackground" data-vbg="https://youtu.be/yoVwN9I2wiA"></div>
	</div>
</template>

<script>

	export default {
		mounted () {
			this.$videoBg('.page-background')
		}
	}

</script>
