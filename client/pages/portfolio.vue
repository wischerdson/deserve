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
						url: 'https://hostrim.ru',
						image: require('~/static/image/project-afonya.png'),
						mobileImage: require('~/static/image/project-afonya.png')
					},
					{
						subtitle: 'Хостинг-провайдер',
						name: 'Hostrim.ru',
						desc: 'Разработка сервиса с функцией услуг регистрации доменов и аренды выделенных серверов',
						url: 'https://hostrim.ru',
						image: require('~/static/image/project-hostrim.png'),
						mobileImage: require('~/static/image/project-hostrim_m.png')
					},
					{
						subtitle: 'Instagram-блогер',
						name: 'Михаил Тимочко',
						desc: 'Реализация telegram-бота для воронки продаж курса "Сайты, Деньги, 2 ствола"',
						url: 'getpods.deserve.ru',
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
