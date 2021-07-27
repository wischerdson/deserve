<template>
	<div class="relative">
		<transition name="scene">
			<div class="w-full" v-show="show">
				<slot />
			</div>
		</transition>
	</div>
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
			position: relative;
			z-index: 2;
		}
		&-leave-active {
			z-index: 1;
			position: absolute;
		}
		&-enter-active, &-leave-active {
			transition: opacity .5s ease;
			
		}
		&-enter, &-leave-to {
			opacity: 0;
		}
	}

</style>