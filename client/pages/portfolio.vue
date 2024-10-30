<template>
	<div class="pt-40 opacity-0">
		<div class="container">
			<main class="space-y-40">
				<portfolio-project
					v-for="(project, idx) in projects"
					:project="project"
					:key="`project_${idx}`"
				/>
			</main>
		</div>
	</div>
</template>

<script>

	import PortfolioProject from '~/components/PortfolioProject'

	export default {
		head () {
			return {
				title: 'Портфолио - Deserve',
				description: '',
				meta: [
					{ property: 'og:title', content: 'Портфолио - Deserve', hid: 'og-title' },
					{ property: 'og:description', content: '', hid: 'og-description' },
				]
			}
		},
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
			this.$el.classList.remove('opacity-0')
		}
	}

</script>
