<template>
	<section class="space-y-40 sm:space-y-28">
		<portfolio-project
			v-for="(project, idx) in projects"
			:project="project"
			:key="`project_${idx}`"
		/>

		<div class="w-full pb-44 lg:pb-28 flex items-center" ref="viewAllWorksScreen">
			<div class="container">
				<div class="w-full max-w-[720px] mx-auto lg:max-w-max lg:mx-0 lg:pl-6">
					<div ref="screenTitle">
						<div class="mb-10">
							<span class="text-sm text-gray-500 tracking-widest font-extralight">What's next?</span>
						</div>
						<h2 class="text-8xl font-extralight tracking-wider lg:text-5xl">Всё портфолио</h2>
					</div>
					<div class="mt-10" ref="viewAllWorksBtn">
						<v-action-pill
							to="/portfolio"
							text="Посмотреть"
							title="View all works"
						/>
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
	data () {
		return {
			projects: [
				{
					subtitle: 'Реселлер Apple',
					name: 'GetPods.ru',
					desc: 'Разработка интернет-магазина для официального реселлера Apple в России',
					url: 'https://getpods.deserve.ru',
					image: require('~/static/image/project-getpods.png')
				},
				{
					subtitle: 'YouTube, Instagram блогер',
					name: 'Афоня TV',
					desc: 'Разработка сервиса с функцией услуг регистрации доменов и аренды выделенных серверов',
					url: 'https://likeagod.deserve.ru',
					image: require('~/static/image/project-afonya.png'),
					mobileImage: require('~/static/image/project-afonya.png'),
					instagram: {
						title: '@afonyatv',
						href: 'https://www.instagram.com/afonyatv'
					}
				},
				{
					subtitle: 'Психотерапевт',
					name: 'Валерия Кумпф',
					desc: 'Минималистичный и интуитивно понятный сайт для практикующего психолога. Проект включает индивидуальный дизайн, подчеркивающий атмосферу доверия и спокойствия, а также удобную структуру для записи на консультации и получения информации об услугах. Сайт адаптирован под все устройства и оптимизирован для продвижения в поисковых системах. Особое внимание уделено простоте обновления контента и быстрой навигации для пользователей.',
					url: 'https://kumpfsmartpsychology.ru',
					image: require('~/static/image/kumpf.jpg'),
					mobileImage: require('~/static/image/kumpf.jpg'),
					instagram: {
						title: '@valeria_kumpf',
						href: 'https://www.instagram.com/valeria_kumpf'
					}
				},
				{
					subtitle: 'Instagram-блогер',
					name: 'Михаил Тимочко',
					desc: 'Реализация telegram-бота для воронки продаж курса "Сайты, Деньги, 2 ствола"',
					url: 'https://t.me/timoch4ko2k',
					image: require('~/static/image/project-timochko.png'),
					instagram: {
						title: '@mikhail.timochko',
						href: 'https://www.instagram.com/mikhail.timochko'
					}
				}
			]
		}
	},
	components: { PortfolioProject },
	mounted () {
		gsap.registerPlugin(ScrollTrigger)

		const tl = gsap.timeline()
		tl.fromTo(this.$refs.screenTitle, { opacity: 0, y: 40 }, { opacity: 1, y: 0 }, 0).addLabel('start')
		tl.fromTo(this.$refs.viewAllWorksBtn, { opacity: 0, y: 40 }, { opacity: 1, y: 0 }, 'start-=60%')

		ScrollTrigger.create({
			animation: tl,
			trigger: this.$refs.viewAllWorksScreen,
			start: '-25% center',
			end: '40% center',
			scrub: true
		})
	}
}

</script>
