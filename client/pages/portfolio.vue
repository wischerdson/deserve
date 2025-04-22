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
