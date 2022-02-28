<template>
	<transition :duration="{ enter: 900, leave: 400 }" @before-enter="beforeEnter" @after-leave="afterLeave">
		<div class="brief-sidebar fixed top-0 h-screen inset-x-0 z-40 bg-black" v-show="opened">
			<div class="w-1/2 xl:w-2/5 lg:hidden h-full relative pointer-events-none">
				<video class="w-full h-full object-cover object-center" :src="require('~/static/video/brief-backdrop.mp4')" autoplay playsinline muted loop></video>
				<div class="bg-black/70 z-10 absolute inset-0"></div>
				<div class="absolute inset-y-0 right-0 w-28 z-20 bg-gradient-to-r from-transparent to-black"></div>
			</div>

			<div class="absolute inset-0 sm:px-8 overflow-y-scroll flex" ref="scrollable">
				<div class="w-1/2 lg:hidden xl:w-2/5 h-full"></div>

				<div class="pl-28 xl:pl-16 sm:pl-0">
					<form-brief @close="$emit('close')" :animate="opened" />
				</div>

				<div class="fixed sm:absolute inset-y-0 right-0 flex flex-col items-center justify-between py-8 sm:py-6 pointer-events-none">
					<div class="separator w-px bg-gray-800 absolute inset-y-0 left-0 origin-bottom sm:hidden"></div>
					<div class="px-10 xl:px-6">
						<v-action
							class="text-gray-600 transition-colors hover:text-gray-200 pointer-events-auto"
							@click="$emit('close')"
							aria-label="Закрыть"
							title="Закрыть"
						>
							<v-icon width="36px" name="close" />
						</v-action>
					</div>
					<div class="uppercase vertical-text font-normal tracking-rr text-gray-400 sm:hidden text-2xs">Deserve brief</div>
				</div>
			</div>
		</div>
	</transition>
</template>

<script>

	import FormBrief from './FormBrief'
	import { disablePageScroll, enablePageScroll } from 'scroll-lock'

	export default {
		props: {
			opened: Boolean
		},
		components: { FormBrief },
		methods: {
			beforeEnter () {
				disablePageScroll(this.$refs.scrollable)
			},
			afterLeave () {
				enablePageScroll()
			}
		}
	}

</script>

<style lang="scss" scoped>

	.brief-sidebar {
		&.v-enter-active, &.v-leave-active {
			transition: opacity .4s ease;

			.separator {
				transition: transform .9s ease;
			}
		}

		&.v-enter, &.v-leave-to {
			opacity: 0;
		}

		&.v-enter {
			.separator {
				transform: scaleY(0);
			}
		}
	}

</style>
