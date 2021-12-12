<template>
	<section class="text-white">
		<div ref="container" class="container">
			<div class="grid grid-cols-[1fr,2fr]">
				<div class="relative z-10">
					<div class="absolute left-10 inset-y-0 -right-24 flex items-center">
						<div ref="title">
							<h2 class="font-semibold text-7xl tracking-wider max-w-lg">Rolls Royce. Wraith.</h2>
							<hr class="w-32 mb-6 mt-5 bg-gray-400">
							<ul class="leading-normal tracking-wider text-gray-400">
								<li><p>Проектирование</p></li>
								<li><p>Дизайн</p></li>
							</ul>
						</div>
					</div>
				</div>
				<div>
					<div ref="image" class="w-full relative after:block after:pt-[62%]">
						<div class="absolute inset-0">
							<img class="w-full h-full object-center object-cover rounded-lg" src="https://www.nastol.com.ua/download.php?img=202105/1680x1050/nastol.com.ua-457046.jpg" alt="">
						</div>
					</div>
				</div>
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

			const $container = this.$refs.container
			const $image = this.$refs.image
			const containerImageWitdhsRatio = $container.offsetWidth/$image.offsetWidth

			const timeline = gsap.timeline()
			timeline.from(this.$refs.image, {
				scale: containerImageWitdhsRatio,
				transformOrigin: "right center"
			}, 0).addLabel('start');
			timeline.from(this.$refs.title, { opacity: 0, x: -50 }, 0).addLabel('start');
			// timeline.to(this.$refs.miniLogo.$el, { opacity: 1 }, 'start-=80%')
			// timeline.to(this.$refs.logoWrapper, { height: 58 }, 'start-=50%')
			// timeline.to(this.$refs.miniLogo.$el, { scale: .7 }, 'start-=50%')

			ScrollTrigger.create({
				animation: timeline,
				trigger: this.$el,
				start: 'center center',
				end: 'bottom top',
				scrub: true,
				markers: true,
				pin: true
			})
		}
	}

</script>
