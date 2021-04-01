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
					<a href="#" class="btn btn-primary btn-line">{{ $t('home.welcome.learn-more') }}</a>
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
		</main>
	</div>
</template>

<script>

	import $ from 'jquery'
	import Portfolio from '@/components/Portfolio'
	
	export default {
		components: {
			Portfolio
		},
		mounted () {
			this.$store.commit('header/transparent', true)
		}
	}

</script>
