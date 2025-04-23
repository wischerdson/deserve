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
				<div class="flex justify-between items-start gap-20 md:block">
					<div>
						<h2 class="text-3xl font-medium tracking-widest uppercase temka-title md:text-2xl md:tracking-wider">Дорогие клиенты!</h2>
						<div class="text-xl mt-6 text-gray-300 font-light">
							<p class="temka-paragraph md:hyphens-auto"><img class="rounded-3xl max-w-[170px] hidden md:inline w-full float-right ml-2 mb-2" src="/image/deserve-founder.jpeg">Если у вас возникли вопросы, касающиеся разработки вашего будущего сайта, которые требуют более индивидуального подхода или касаются личных деталей, не стесняйтесь обращаться ко мне напрямую. Я всегда готов обсудить все нюансы, понять ваши особенности и предложить оптимальные решения для вашего проекта. <br>Буду рад помочь вам сделать сайт, который полностью будет отвечать вашим ожиданиям и потребностям.<br><br><span class="font-medium">С уважением, Артём <br>Основатель веб-студии Deserve</span></p>
						</div>

						<a
							class="inline-flex items-center bg-white/20 hover:bg-white/25 mt-8 rounded-lg px-3 py-1.5 temka-telega"
							href="https://t.me/momsyakov"
							target="_blank"
						>
							<v-icon name="telegram" width="22px" />
							<span class="inline-block ml-3 mt-0.5 tracking-wider text-base">Мой Telegram</span>
						</a>
					</div>

					<img class="rounded-3xl max-w-[330px] md:hidden w-full flex-shrink-0 temka-photo" src="/image/deserve-founder.jpeg">
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
	const $title = document.querySelector('.temka-title')
	const $paragraph = document.querySelector('.temka-paragraph')
	const $photo = document.querySelector('.temka-photo')
	const $telega = document.querySelector('.temka-telega')

	ScrollTrigger.matchMedia({
		// Desktop animation
		'(min-width: 1024px)': () => {
			const tl = gsap.timeline()
			tl.fromTo($title, { opacity: 0, x: -40 }, { opacity: 1, x: 0 }, 0).addLabel('start')
			tl.fromTo($photo, { opacity: 0, x: 40 }, { opacity: 1, x: 0 }, 'start-=75%')
			tl.fromTo($paragraph, { opacity: 0, x: -40 }, { opacity: 1, x: 0 }, 'start-=60%')
			tl.fromTo($telega, { opacity: 0, x: -40 }, { opacity: 1, x: 0 }, 'start-=60%')

			ScrollTrigger.create({
				animation: tl,
				trigger: component.$refs.temka,
				start: '-35% center',
				end: '40% center',
				scrub: true
			})
		}
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

		initTemkaScollTrigger(this)
	}
}

</script>
