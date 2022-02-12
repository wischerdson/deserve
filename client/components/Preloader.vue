<template>
	<transition name="preloader">
		<div v-if="show" class="fixed inset-0 bg-black z-40 flex items-center justify-center">
			<transition :duration="1400" name="icon" @after-enter="iconEntered">
				<v-icon v-if="icon" class="text-orange-300 w-40" name="deserve-mini-logo" />
			</transition>
		</div>
	</transition>
</template>

<script>

	import { disablePageScroll, enablePageScroll } from 'scroll-lock';

	export default {
		data () {
			return {
				show: true,
				icon: false
			}
		},
		methods: {
			iconEntered () {
				this.show = false
				enablePageScroll()
			}
		},
		mounted () {
			disablePageScroll()
			this.icon = true
		}
	}

</script>

<style lang="scss" scoped>

	.icon {
		&-enter-active {
			transition: transform 1s ease, opacity 1.5s ease;
		}
		&-enter {
			transform: scale(.9);
			opacity: 0;
		}
	}

	.preloader-leave-active {
		transition: transform 1.5s ease, opacity 1s ease;
	}
	.preloader-leave-to {
		opacity: 0;
		transform: scale(1.5);
	}

</style>
