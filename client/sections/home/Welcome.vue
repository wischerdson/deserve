<template>
	<section class="min-h-screen flex items-center relative overflow-hidden">
		<!-- Background -->
		<div class="h-screen top-0 inset-x-0 z-0">
			<video class="absolute top-0 left-0 h-full w-full z-0 object-cover object-center" autoplay playsinline muted loop>
				<source :src="require('~/static/video/welcome.mp4')" type="video/mp4" />
			</video>
			<div class="absolute inset-0 bg-black/70 backdrop-contrast-150"></div>
		</div>

		<div class="absolute inset-0 z-10 flex items-center overflow-hidden" ref="welcome_text">
			<div class="container lg:-mr-1.5">
				<p class="text-center mb-10 text-xl uppercase tracking-[.5rem] lg:text-lg lg:tracking-[.4rem] font-thin sm:leading-normal">Ваш партнер <br class="hidden sm:block">в digital-среде</p>
				<h1 class="text-center text-6xl uppercase tracking-widest lg:text-5xl md:leading-normal font-thin">Design. Strategy. Harmony.</h1>
				<div class="text-center">
					<v-action class="details-action btn mt-10 uppercase tracking-[.3rem] text-xs relative leading-none px-4 py-2" :magnetic="true" to="/portfolio">
						<span>Подробнее</span>
						<v-icon width="14px" class="ml-2 -right-2 block mb-[3px] pointer-events-none" name="chevron-right" />
					</v-action>
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
