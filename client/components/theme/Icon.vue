<template>
	<span class="icon inline-block" :class="`icon-${name}`" v-html="require(`!!raw-loader!~/assets/svg/${name}.svg`).default"></span>
</template>

<script>
	export default {
		name: 'icon',
		props: {
			name: String,
			width: String,
			height: String
		},
		mounted () {
			const svg = this.$el.querySelector('svg')
			svg.style.width = this.width || svg.style.width
			svg.style.height = this.height || svg.style.height
		}
	}
</script>
