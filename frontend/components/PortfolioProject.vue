<template>
	<div ref="container" class="container">
		<div class="grid grid-cols-[1fr,2fr] lg:hidden">
			<div class="relative z-10">
				<div class="absolute left-10 inset-y-0 -right-24 flex items-center">
					<div ref="title">
						<h2 class="font-extralight text-7xl tracking-wider max-w-lg">GetPods.ru</h2>
						<hr class="w-32 mt-3 h-px bg-gray-700">
						<p class="mt-8 text-gray-400 tracking-rr font-thin">Разработка интернет-магазина для официального реселлера Apple</p>
						<a
							class="btn rounded-full mt-7 space-x-5"
							href="https://getpods.ru"
							target="_blank"
							ref="viewProjectBtn"
						>
							<div class="flex items-center justify-center w-12 h-12 rounded-full bg-white text-black">
								<v-icon name="chevron-right" />
							</div>
							<span class="text-xs tracking-rr uppercase text-white">Посмотреть работу</span>
						</a>
					</div>
				</div>
			</div>
			<div>
				<div ref="image" class="w-full relative after:block after:pt-[60%] will-change-transform">
					<div class="absolute inset-0 rounded-3xl" :style="`background-image:url('${image}')`"></div>
				</div>
			</div>
		</div>
		<!-- Mobile -->
		<div class="hidden lg:block">
			<div ref="mobileImage" class="w-full relative after:block after:pt-full">
				<div class="absolute inset-0 rounded-3xl" :style="`background-image:url('${image}')`"></div>
			</div>
			<div class="-mt-24" ref="mobileTitle">
				<div class="text-6xl font-extralight tracking-wider">GetPods.ru</div>
				<hr class="w-32 mb-6 mt-5 bg-gray-700 h-px">
				<p class="mt-8 text-gray-400 tracking-rr font-thin text-sm leading-normal">Разработка интернет-магазина для официального реселлера Apple</p>
				<a
					class="btn rounded-full mt-7 space-x-5"
					href="https://getpods.ru"
					target="_blank"
				>
					<div class="flex items-center justify-center w-12 h-12 rounded-full bg-white text-black">
						<v-icon name="chevron-right" />
					</div>
					<span class="text-xs tracking-rr uppercase text-white">Посмотреть работу</span>
				</a>
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

			this.$magnetic.add({ element: this.$refs.viewProjectBtn, powerDistance: 0 })

			ScrollTrigger.matchMedia({
				// Desktop animation
				'(min-width: 1024px)': () => {
					const timeline = gsap.timeline()
					timeline.from(this.$refs.image, { opacity: 0 }, 0).addLabel('start')
					timeline.from(this.$refs.image, {
						scale: containerImageWitdhsRatio,
						transformOrigin: "right center"
					}, 'start-=70%')
					timeline.from(this.$refs.title, { opacity: 0, x: -50 }, 'start-=70%')

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
					timeline.from(this.$refs.mobileImage, { opacity: 0, scale: .95 }, 0).addLabel('start');
					timeline.from(this.$refs.mobileTitle, { opacity: 0, y: 50 }, 'start-=70%');

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
