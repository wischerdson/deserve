<template>
	<div>
		<div class="preloader" ref="preloader" v-if="isProduction">
			<img src="@/static/img/preloader.gif" alt="">
		</div>

		<Header />
		<div class="page-content">
			<Nuxt />
		</div>
		<Footer />

		<div class="cursor-dot-outline"></div>
		<div class="cursor-dot"></div>

		<story />

		<button class="scroll-top btn btn-red !rounded-b-none !rounded-tl-none" :class="{
			'hidden': !showScrollTopBtn
		}" @click="scrollTop">
			<div class="scroll-line"></div>
			<span class="scroll-text">{{ $t('scroll-top') }}</span>
		</button>
	</div>
</template>

<script>

	import $ from 'jquery'
	import AOS from 'aos'
	import Header from '@/components/Header'
	import Footer from '@/components/Footer'
	import Story from '@/components/Story'

	export default {
		components: { Header, Footer, Story },
		data: () => ({
			showScrollTopBtn: false
		}),
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
		methods: {
			scrollTop () {
				new this.$smoothScroll(null, {
					easing: 'easeInOutQuint',
					speed: 300
				}).animateScroll(0)
			},
			scrollTopBtn () {
				const scroll = window.pageYOffset
				const docHeight = document.documentElement.clientHeight

				this.showScrollTopBtn = scroll >= this.$scrollHeight() - docHeight - 300
			}
		},
		mounted () {
			this.scrollTopBtn()
			document.addEventListener('scroll', this.scrollTopBtn)

			this.$router.afterEach(() => {
				setTimeout(this.$cursor.refresh, 1000)
				AOS.init({ once: true, duration: 800 })
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