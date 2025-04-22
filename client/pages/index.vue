<template>
	<div>
		<WelcomeSection />

		<div class="mt-20" ref="useless_items_wrapper">
			<div class="container">
				<ul class="grid grid-cols-3 -mx-12 lg:grid-cols-1 lg:gap-7 lg:text-center lg:max-w-xs lg:mx-auto">
					<li class="useless-item px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">От идеи до реализации желаемого результата</h2>
						<p class="text-gray-500 text-sm tracking-widest leading-normal">Наша приоритетная задача - эффективное сопровождение Вашего бизнеса, направленное на достижение запланированного результата.</p>
					</li>
					<li class="useless-item px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">Определим векторы развития и освежим стилистику</h2>
						<p class="text-gray-500 text-sm tracking-widest leading-normal">Улучшим UX/UI проекта, проведём изучение целевой аудитории потребителей с целью определения наиболее результативной модели развития Вашего бренда.</p>
					</li>
					<li class="useless-item px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">Окажем поддержку при последующем развитии запущенного проекта</h2>
						<p class="text-gray-500 text-sm tracking-widest leading-normal">Путём системного анализа достигаемых результатов, выявим факторы, способные повысить качественные показатели результативности проекта.</p>
					</li>
				</ul>
			</div>
		</div>

		<PortfolioSection class="mt-16" />

		<section class="pt-20" ref="temka">
			<div class="container">
				<div class="flex justify-between items-start gap-20">
					<div>
						<h2 class="text-3xl font-medium tracking-widest uppercase temka-title">Дорогие клиенты!</h2>
						<p class="text-xl tracking-wider mt-6 text-gray-300 font-light temka-paragraph">Если у вас возникли вопросы, касающиеся разработки вашего будущего сайта, которые требуют более индивидуального подхода или касаются личных деталей, не стесняйтесь обращаться ко мне напрямую. Я всегда готов обсудить все нюансы, понять ваши особенности и предложить оптимальные решения для вашего проекта. <br>Буду рад помочь вам сделать сайт, который полностью будет отвечать вашим ожиданиям и потребностям. <br><br>С уважением, Артём <br>Основатель веб-студии Deserve</p>
					</div>

					<img class="rounded-3xl max-w-[380px] w-full flex-shrink-0 temka-photo sdf" src="/image/deserve-founder.jpeg">
				</div>
			</div>
		</section>
	</div>
</template>

<script>

import WelcomeSection from '~/sections/home/Welcome'
import PortfolioSection from '~/sections/home/Portfolio'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

const initTemkaScollTrigger = (component) => {
	const timeline = gsap.timeline()

	const $title = document.querySelector('.temka-title')
	const $paragraph = document.querySelector('.temka-paragraph')
	const $photo = document.querySelector('.temka-photo')

	timeline.fromTo($title, { opacity: 0 }, { opacity: 1 }, '100%')

	ScrollTrigger.create({
		animation: timeline,
		trigger: component.$refs.temka,
		start: 'top center',
		end: 'bottom center',
		scrub: true,
		markers: true
	})
}

export default {
	components: { WelcomeSection, PortfolioSection },
	head () {
		return {
			title: 'Агентство Deserve - создание и продвижение сайтов любой сложности под ключ',
			description: 'Создание эффективных сайтов любой сложности под ключ и поисковое продвижение для бизнеса. Персональный менеджер на всех этапах создания проекта.',
			meta: [
				{ property: 'og:title', content: 'Агентство Deserve', hid: 'og-title' },
				{ property: 'og:description', content: 'Создание эффективных сайтов любой сложности под ключ и поисковое продвижение для бизнеса. Персональный менеджер на всех этапах создания проекта.', hid: 'og-description' },
			]
		}
	},
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

		// initTemkaScollTrigger(this)
	}
}

</script>
