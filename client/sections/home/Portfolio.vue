<template>
	<section class="space-y-40">
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
					subtitle: 'Ремонт под ключ',
					name: 'АБИС',
					desc: 'Ремонт коммерческой недвижимости а-класса',
					url: 'http://deservesite35886.uxp.ru',
					image: require('~/static/image/project-abis.jpeg')
				},
				{
					subtitle: 'Каршеринг',
					name: 'Б2НЗИН',
					desc: 'Аренда премиум авто в Горном Алтае',
					url: 'http://deservesite19963.uxp.ru',
					image: require('~/static/image/project-b2nzin.jpeg')
				},
				{
					subtitle: 'Импортер',
					name: 'PIERRE',
					desc: 'Дистрибьютор итальянской и испанской плитки',
					url: 'http://deservesite83129.uxp.ru',
					image: require('~/static/image/project-pierre.jpeg')
				},
				{
					subtitle: 'Управляющая компания',
					name: 'Port PM',
					desc: 'Сопровождение строительства и реконструкция зданий под отели',
					url: 'http://deservesite84652.uxp.ru',
					image: require('~/static/image/project-port-pm.jpeg')
				},
				{
					subtitle: 'Instagram-блогер',
					name: 'Михаил Тимочко',
					desc: 'Реализация telegram-бота для воронки продаж курса "Сайты, Деньги, 2 ствола"',
					url: 'https://timochko.deserve.ru/',
					image: require('~/static/image/project-timochko.png')
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
