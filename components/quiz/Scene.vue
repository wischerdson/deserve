<template>
	<transition name="scene" mode="out-in">
		<div class="w-full" v-show="show">
			<slot />
		</div>
	</transition>
</template>

<script>
	
	export default {
		props: {
			step: Number
		},
		computed: {
			show () {
				return this.$parent.step === this.step
			}
		}
	}

</script>

<style lang="scss" scoped>
	
	.scene {
		&-enter-active {
			transition: opacity .5s ease;
			position: relative;
			z-index: 2;
		}
		&-enter {
			opacity: 0;
		}
		&-leave-active {
			position: absolute;
			opacity: 0;
		}
	}

</style>