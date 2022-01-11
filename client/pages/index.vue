<template>
	<div>
		<WelcomeSection />

		<div class="mt-20" ref="useless_items_wrapper">
			<div class="container">
				<ul class="grid grid-cols-3 -mx-12 lg:grid-cols-1 lg:gap-7 lg:text-center lg:max-w-xs lg:mx-auto">
					<li class="useless-item px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">От идеи до реализации желаемого результата</h2>
						<p class="text-gray-500 text-sm tracking-widest leading-normal">В первую очередь мы нацелены на результат, чтобы максимально быстро и качественно решать задачи, стоящие перед вашим бизнесом</p>
					</li>
					<li class="useless-item px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">Найдем точки роста и обновим <br>стилистику</h2>
						<p class="text-gray-500 text-sm tracking-widest leading-normal">Улучшим UX/UI проекта, проведем анализ аудитории. Найдем новые формы и смыслы, поможем сменить позиционирование и ключевое сообщение бренда</p>
					</li>
					<li class="useless-item px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">Поддержим и поможем двигаться <br>быстрее</h2>
						<p class="text-gray-500 text-sm tracking-widest leading-normal">Возьмем на себя контроль по системному развитию проекта: новые страницы и дополнительные функции, которые принесут пользу бизнесу</p>
					</li>
				</ul>
			</div>
		</div>

		<PortfolioSection class="mt-16" />
	</div>
</template>

<script>

	import WelcomeSection from '~/sections/home/Welcome'
	import PortfolioSection from '~/sections/home/Portfolio'
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
				timeline.fromTo(
					uselessElements[i],
					{ opacity: 0 },
					{ opacity: 1 },
					`${i*percent}%`
				)
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
