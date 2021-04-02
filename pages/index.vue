<template>
	<div>
		<main>
			<section id="section_welcome">
				<div class="backdrop"></div>
				<div class="red-overlay"></div>
				<div class="section-content container">
					<div class="text-1">{{ $t('home.welcome.text-1') }}</div>
					<h1 class="text-2">
						<span class="stroke-text">DESIGN <br class="br"> &</span>
						STRATEGY
					</h1>
					<p class="text-3">Let's build your dream together</p>
					<nuxt-link class="btn btn-primary btn-line" :to="localePath('feedback')">{{ $t('home.welcome.learn-more') }}</nuxt-link>
				</div>
			</section>
			<section id="section_projects">
				<div class="section-header container">
					<p class="comic-text">Company portfolio</p>
					<h2 class="section-title" v-html="$t('portfolio.title')"></h2>
					<p class="section-description" v-html="$t('portfolio.description')"></p>
				</div>
				<portfolio />
			</section>
			<section class="parallax-section">
				<Parallax />
			</section>
		</main>
	</div>
</template>

<script>

	import $ from 'jquery'
	import Portfolio from '@/components/Portfolio'
	import Parallax from '@/components/Parallax'
	
	export default {
		components: {
			Portfolio, Parallax
		},
		mounted () {
			this.$store.commit('header/transparent', true)
		},
		head: {
			title: "Главная - Deserve",
			description: "Добро пожаловать в наш мир. Мы - Deserve, креативное digital агентство. Мы предлагаем различные виды цифровых услуг."
		}
	}

</script>
