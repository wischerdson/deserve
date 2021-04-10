<template>
	<div>
		<main>
			<section id="section_welcome">
				<div class="backdrop"></div>
				<div class="red-overlay" data-aos-delay="200" data-aos="fade-left"></div>
				<div class="section-content container">
					<div class="text-1" data-aos="fade-up" data-aos-delay="100">{{ $t('home.welcome.text-1') }}</div>
					<h1 class="text-2"  data-aos="fade-up" data-aos-delay="300">
						<span class="stroke-text">DESIGN <br class="br"> &</span>
						STRATEGY
					</h1>
					<p class="text-3" data-aos="fade-up" data-aos-delay="500">Let's build your dream together</p>
					<div data-aos="fade-up" data-aos-delay="500" >
					<nuxt-link class="btn btn-primary btn-line" :to="localePath('feedback')">{{ $t('home.welcome.learn-more') }}</nuxt-link>
						
					</div>
				</div>
			</section>
			<section id="section_projects">
				<div class="section-header container">
					<p class="comic-text" data-aos="fade-up">Company portfolio</p>
					<h2 class="section-title" data-aos-delay="200" v-html="$t('portfolio.title')"  data-aos="fade-up"></h2>
					<p class="section-description" data-aos-delay="400" data-aos="fade-up" v-html="$t('portfolio.description')"></p>
				</div>
				<div data-aos-delay="600" data-aos="fade-up" >
					<portfolio  />
				</div>
			</section>
			<section style="padding: 100px 0; overflow: hidden;" data-aos="fade-up" data-aos-delay="200">
				<services-range />
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
	import ServicesRange from '@/components/ServicesRange'
	import Parallax from '@/components/Parallax'
	
	export default {
		components: {
			Portfolio, Parallax, ServicesRange
		},
		mounted () {
			this.$store.commit('header/transparent', true)
		},
		head () {
			return {
				title: this.$t('pages.home.title'),
				meta: [
					{ property: 'og:title', content: this.$t('pages.home.title'), hid: 'og-title' },
				]
			}
		}
	}

</script>
