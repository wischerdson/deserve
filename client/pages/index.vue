<template>
	<div>
		<WelcomeSection />

		<div class="mt-20" ref="useless_items_wrapper">
			<div class="container">
				<ul class="grid grid-cols-4 -mx-12 lg:grid-cols-1 lg:gap-7 lg:text-center lg:max-w-xs lg:mx-auto">
					<li class="useless-item px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">От идеи до желаемого результата</h2>
						<p class="text-gray-500 text-xs font-normal tracking-widest leading-tight">Выполняем все этапы видеопроизводства</p>
					</li>
					<li class="useless-item px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">От идеи до желаемого результата</h2>
						<p class="text-gray-500 text-xs font-normal tracking-widest leading-tight">Выполняем все этапы видеопроизводства</p>
					</li>
					<li class="useless-item px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">От идеи до желаемого результата</h2>
						<p class="text-gray-500 text-xs font-normal tracking-widest leading-tight">Выполняем все этапы видеопроизводства</p>
					</li>
					<li class="useless-item px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">От идеи до желаемого результата</h2>
						<p class="text-gray-500 text-xs font-normal tracking-widest leading-tight">Выполняем все этапы видеопроизводства</p>
					</li>
				</ul>
			</div>
		</div>

		<PortfolioSection class="mt-16" />
	</div>
</template>

<script>

	import WelcomeSection from '~/sections/home/Welcome'
	import PortfolioSection from '~/sections/Portfolio'
	import gsap from 'gsap'
	import { ScrollTrigger } from 'gsap/ScrollTrigger'

	export default {
		components: { WelcomeSection, PortfolioSection },
		mounted () {
			gsap.registerPlugin(ScrollTrigger)

			const timeline = gsap.timeline()
			const uselessElements = document.querySelectorAll('.useless-item')
			const percent = 100/uselessElements.length

			for (let i = 0; i < uselessElements.length; i++) {
				timeline.from(uselessElements[i], { opacity: 0 }, `${i*percent}%`)
			}

			ScrollTrigger.create({
				animation: timeline,
				trigger: this.$refs.useless_items_wrapper,
				start: 'top bottom',
				end: 'bottom center',
				scrub: true
			})
		}
	}

</script>
