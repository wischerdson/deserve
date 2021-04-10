<template>
	<div>
		<main>
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
	
	import Portfolio from '@/components/Portfolio'
	import Parallax from '@/components/Parallax'
	
	export default {
		components: {
			Portfolio, Parallax
		},
		head () {
			return {
				title: this.$t('pages.portfolio.title'),
				meta: [
					{ property: 'og:title', content: this.$t('pages.portfolio.title'), hid: 'og-title' },
				]
			}
		}
	}

</script>