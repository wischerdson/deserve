<template>
	<div class="pt-20 opacity-0">
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
