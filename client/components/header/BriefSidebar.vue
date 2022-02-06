<template>
	<transition :duration="400">
		<div class="contact-us-sidebar fixed inset-0 z-40 bg-black" v-show="opened">
			<div class="absolute inset-0 sm:px-8 sm:mt-20 overflow-y-scroll flex">
				<div class="w-1/2 xl:w-2/5 lg:hidden h-full fixed">
					<video class="w-full h-full object-cover object-center" :src="require('~/static/video/brief-backdrop.mp4')" autoplay playsinline muted loop></video>
					<div class="bg-black/70 z-10 absolute inset-0"></div>
				</div>

				<div class="w-1/2 lg:hidden xl:w-2/5 h-full"></div>

				<div class="pl-28 xl:pl-16 sm:pl-0">
					<brief-form class="sm:pt-0" />
				</div>
			</div>

			<div class="absolute inset-y-0 right-0 flex flex-col items-center justify-between py-8 sm:py-6 pointer-events-none">
				<div class="separator w-px bg-gray-600 absolute inset-y-0 left-0 origin-bottom sm:hidden"></div>
				<div class="px-10 xl:px-6">
					<button class="btn text-gray-600 transition-colors hover:text-gray-200 pointer-events-auto" @click="$emit('close')" aria-label="Закрыть" title="Закрыть">
						<v-icon width="36px" name="close" />
					</button>
				</div>
				<div class="uppercase vertical-text font-normal tracking-rr text-gray-400 sm:hidden">Deserve</div>
			</div>
		</div>
	</transition>
</template>

<script>

	import BriefForm from './BriefForm'

	export default {
		props: {
			opened: Boolean
		},
		components: { BriefForm }
	}

</script>

<style lang="scss" scoped>

	.contact-us-sidebar {
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
