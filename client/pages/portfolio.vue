<template>
	<div class="pt-44 opacity-0">
		<div class="container">
			<h1 class="text-7xl font-extralight tracking-[.5rem] lg:text-4xl lg:tracking-[.25rem]">Наши работы</h1>
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
						name: 'GetPods',
						desc: 'Разработка интернет-магазина для официального реселлера Apple',
						url: 'getpods.deserve.ru',
						image: require('~/static/image/project-getpods.png')
					},
					{
						name: 'Hostrim',
						desc: 'Разработка интернет-магазина для официального реселлера Apple',
						url: 'getpods.deserve.ru',
						image: require('~/static/image/project-hostrim.png'),
						mobileImage: require('~/static/image/project-hostrim_m.png')
					},
					{
						name: 'Timochko',
						desc: 'Разработка интернет-магазина для официального реселлера Apple',
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
