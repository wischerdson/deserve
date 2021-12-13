<template>
	<section class="min-h-screen flex items-center relative">
		<!-- Background -->
		<div class="absolute inset-0">
			<video
				class="w-full h-full object-cover object-center"
				:src="require('~/static/video/welcome-background.mp4')"
				autoplay="autoplay"
				preload="auto"
				loop="loop"
				muted="muted"
				disablePictureInPicture
				playsinline
			></video>
			<div class="absolute inset-0 bg-black/70"></div>
		</div>
		<div ref="welcome_text" class="absolute inset-0 z-10 flex items-center">
			<div class="container">
				<p class="text-white text-center mb-10 text-xl uppercase tracking-[.5rem]">Ваш партнер в digital-среде</p>
				<h1 class="text-white text-center font-light text-6xl uppercase tracking-widest">Design. Strategy. Harmony.</h1>
				<div class="text-center">
					<a class="details-action btn mt-10 text-white uppercase tracking-[.3rem] text-xs relative leading-none px-4 py-2" href="#">
						<span>Подробнее</span>
						<v-icon width="14px" class="absolute -right-2 block mb-[3px] pointer-events-none" name="chevron-right" />
					</a>
				</div>
			</div>
		</div>
		<div class="absolute inset-x-0 bottom-0 flex justify-center z-10">
			<div class="absolute inset-x-0 bottom-0 -top-20 bg-gradient-to-b from-transparent to-black"></div>
			<div class="w-0.5 bg-white/20 h-20 overflow-hidden z-10">
				<div class="anim-scroll-down w-full h-full bg-white"></div>
			</div>
		</div>
	</section>
</template>

<script>

	import gsap from 'gsap'
	import { ScrollTrigger } from 'gsap/ScrollTrigger'

	export default {
		mounted () {
			gsap.registerPlugin(ScrollTrigger)

			const timeline = gsap.timeline()
			timeline.to(this.$refs.welcome_text, { opacity: 0 })

			ScrollTrigger.create({
				animation: timeline,
				trigger: this.$el,
				start: '60% center',
				end: 'center top',
				scrub: true
			})
		}
	}

</script>

<style lang="scss" scoped>

	.details-action {
		.icon {
			transition: transform .2s ease;
			will-change: transform;
		}
		&:hover .icon {
			transform: translateX(4px);
		}
	}

	.anim-scroll-down {
		animation: section_welcome__scroll_down 2.2s ease-in-out infinite;
		will-change: transform, transform-origin;
	}

	@keyframes section_welcome__scroll_down {
		0% {
			transform-origin: 0 0;
			transform: scaleY(.90) translateY(-90px);
		}
		85% {
			transform-origin: 0 100%;
			transform: scaleY(.70) translateY(80px);
		}
		100% {
			transform-origin: 0 100%;
			transform: scaleY(.70) translateY(80px);
		}
	}

</style>
