<template>
	<div>
		<slot name="trigger"/>
		<slot>
			<!-- <slot name="trigger" ref="trigger" /> -->
		</slot>
	</div>
</template>

<script>

	export default {
		// props: {
		// 	powerDistance: {
		// 		type: Number,
		// 		default: 50
		// 	},
		// 	refresh: { default: false }
		// },
		// data () {
		// 	return {
		// 		magnet: null
		// 	}
		// },
		// watch: {
		// 	refresh () {
		// 		this.magnet.refresh()
		// 	}
		// },
		mounted () {
			console.log(this)
			// const trigger = this.$slots.hasOwnProperty('trigger') ? this.$refs.trigger : this.$el

			// this.magnet = this.$magnetic.add({
			// 	element: this.$el,
			// 	trigger,
			// 	powerDistance: this.powerDistance,
			// 	updateOnScroll: true
			// })
		}
	}

</script>
