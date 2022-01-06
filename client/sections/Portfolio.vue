<template>
	<section class="text-white space-y-40">
		<portfolio-project :image="require('~/static/image/project-getpods.png')" />
		<portfolio-project :image="require('~/static/image/project-hostrim.png')" />
		<portfolio-project :image="require('~/static/image/project-timochko.png')" />

		<div class="w-full h-screen flex items-center" ref="viewAllWorksScreen">
			<div class="container">
				<div class="w-full max-w-[720px] mx-auto lg:max-w-max lg:mx-0 lg:pl-6">
					<div ref="screenTitle">
						<div class="mb-10">
							<span class="text-sm text-gray-500 tracking-widest font-extralight">What's next?</span>
						</div>
						<h2 class="text-8xl font-extralight tracking-wider lg:text-5xl">Всё портфолио</h2>
					</div>
					<div class="mt-10">
						<nuxt-link class="btn" to="/portfolio" title="View all works" ref="viewAllWorksBtn">
							<div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-400 text-black hover:bg-white transition-colors" ref="viewAllWorksBtnPill">
								<v-icon name="chevron-right" />
							</div>
							<span class="text-xs tracking-rr uppercase text-white">Посмотреть</span>
						</nuxt-link>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>

	import gsap from 'gsap'
	import { ScrollTrigger } from 'gsap/ScrollTrigger'
	import PortfolioProject from '~/components/PortfolioProject'

	export default {
		components: { PortfolioProject },
		mounted () {
			gsap.registerPlugin(ScrollTrigger)

			this.$magnetic.add({
				element: this.$refs.viewAllWorksBtn.$el,
				trigger: this.$refs.viewAllWorksBtnPill,
				updateOnScroll: true
			})

			const tl = gsap.timeline()
			tl.fromTo(this.$refs.screenTitle, { opacity: 0 }, { opacity: 1 }, 0).addLabel('start')
			tl.fromTo(this.$refs.viewAllWorksBtn.$el, { opacity: 0, x: -20 }, { opacity: 1, x: 0 }, 'start-=60%')

			ScrollTrigger.create({
				animation: tl,
				trigger: this.$refs.viewAllWorksScreen,
				start: '15% center',
				end: '60% center',
				scrub: true
			})
		}
	}

</script>
