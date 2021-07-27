<template>
	<div>
		<div class="preloader" ref="preloader" v-if="isProduction">
			<img src="@/static/img/preloader.gif" alt="">
		</div>

		<quiz />

		<Header />
		<div class="page-content">
			<Nuxt />
		</div>
		<Footer />

		<div class="cursor-dot-outline"></div>
		<div class="cursor-dot"></div>

		<button class="scroll-top btn btn-red hidden">
			<div class="scroll-line"></div>
			<span class="scroll-text">{{ $t('scroll-top') }}</span>
		</button>
	</div>
</template>

<script>

	import $ from 'jquery'
	import AOS from 'aos'
	import Header from '@/components/Header'
	import Quiz from '@/components/Quiz'

	export default {
		components: { Header, Quiz },
		watch: {
			$route () {
				this.$store.commit('header/transparent', false)
				
			}
		},
		computed: {
			isProduction () {
				return process.env.NODE_ENV === 'production'
			}
		},
		mounted () {
			$(document).scroll((e) => {
				const scroll = $(window).scrollTop()

				/* Scroll top button */
				const scrollTop = $('.scroll-top')
				scroll < $(window).height() ? scrollTop.addClass('hidden') : scrollTop.removeClass('hidden')
			})

			var scroll = new this.$smoothScroll(null, {
				easing: 'easeInOutQuint',
				speed: 300
			})

			$('.scroll-top').click(() => {
				scroll.animateScroll(0);
			})

			this.$router.afterEach(() => {
				setTimeout(() => {
					this.$cursor.refresh()
				}, 1000)

				AOS.init({
					once: true,
					duration: 800
				})
			})

			setTimeout(() => {
				$(this.$refs.preloader).addClass('hidden')
				AOS.init({
					once: true,
					duration: 800
				})
				this.$cursor.init()
			}, 1500)
		}
	}
</script>