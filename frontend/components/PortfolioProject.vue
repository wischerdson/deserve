<template>
	<div ref="container" class="container">
		<div class="grid grid-cols-[1fr,2fr] lg:hidden">
			<div class="relative z-10">
				<div class="absolute left-10 inset-y-0 -right-24 flex items-center">
					<div ref="title">
						<h2 class="font-semibold text-7xl tracking-wider max-w-lg">GetPods.ru</h2>
						<hr class="w-32 mb-6 mt-5 bg-gray-400">
						<p class="tracking-rr">Разработка интернет-магазина</p>
						<!-- <ul class="leading-normal tracking-wider text-gray-400">
							<li><p>Проектирование</p></li>
							<li><p>Дизайн</p></li>
						</ul> -->
						<a
							class="btn h-12 px-10 rounded-full mt-7 uppercase border border-white/60 text-xs tracking-rr hover:opacity-50 transition-opacity"
							href="https://getpods.ru"
							target="_blank"
						>Посмотреть работу</a>
					</div>
				</div>
			</div>
			<div>
				<div ref="image" class="w-full relative after:block after:pt-[60%] will-change-transform">
					<div class="absolute inset-0 rounded-3xl" :style="`background-image:url('${image}')`"></div>
					<!-- <div class="absolute inset-0 rounded-lg" :style="`background-image:url(${require('~/static/image/sdsds.png')})`"></div> -->
				</div>
			</div>
		</div>
		<div class="hidden lg:block">
			<div ref="mobileImage" class="w-full relative after:block after:pt-full">
				<div class="absolute inset-0 rounded-3xl" :style="`background-image:url('${image}')`"></div>
			</div>
			<div ref="mobileTitle">
				<div class="text-6xl font-semibold">GetPods.ru</div>
				<hr class="w-32 mb-6 mt-5 bg-gray-400/50 h-px">
				<p class="tracking-widest text-sm font-extralight leading-normal">Разработка интернет-магазина для официального реселлера Apple</p>
				<a
					class="btn h-12 px-6 rounded-full mt-7 uppercase border border-white/60 text-[.6rem] tracking-rr hover:opacity-50 transition-opacity"
					href="https://getpods.ru"
					target="_blank"
				>Посмотреть работу</a>
			</div>
		</div>
	</div>
</template>


<script>

	import gsap from 'gsap'
	import { ScrollTrigger } from 'gsap/ScrollTrigger'

	export default {
		props: {
			image: {
				type: String
			}
		},
		mounted () {
			gsap.registerPlugin(ScrollTrigger)

			const $container = this.$refs.container
			const $image = this.$refs.image
			const containerImageWitdhsRatio = $container.offsetWidth/$image.offsetWidth

			ScrollTrigger.matchMedia({
				// Desktop animation
				'(min-width: 1024px)': () => {
					const timeline = gsap.timeline()
					timeline.from(this.$refs.image, { opacity: 0 }, 0).addLabel('start')
					timeline.from(this.$refs.image, {
						scale: containerImageWitdhsRatio,
						transformOrigin: "right center"
					}, 'start-=80%')
					timeline.from(this.$refs.title, { opacity: 0, x: -50 }, 'start-=80%')

					ScrollTrigger.create({
						animation: timeline,
						trigger: this.$el,
						start: 'center center',
						end: 'bottom top',
						scrub: true,
						pin: true
					})
				},
				// Mobile animation
				'(max-width: 1023px)': () => {
					const timeline = gsap.timeline()
					timeline.from(this.$refs.mobileImage, { opacity: 0 }, 0).addLabel('start');
					timeline.from(this.$refs.mobileTitle, { opacity: 0, y: 50 }, 'start-=80%');

					ScrollTrigger.create({
						animation: timeline,
						trigger: this.$el,
						start: 'top center',
						end: '70% center',
						scrub: true
					})
				}
			})
		}
	}

</script>
