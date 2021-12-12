<template>
	<header class="section-header fixed inset-x-0 top-0 z-30 bg-black/30 backdrop-filter backdrop-blur-lg">
		<div class="container">
			<div class="grid grid-cols-3">
				<div class="h-full flex items-center">
					<button class="btn text-gray-300 uppercase text-xs tracking-widest" @click="menu = !menu">
						<v-icon class="mb-1" name="menu" />
						<span>Menu</span>
					</button>
				</div>
				<div class="flex justify-center">
					<a class="flex justify-center items-center relative text-white h-[5.5rem]" ref="logoWrapper" href="/">
						<v-icon ref="fullLogo" name="deserve-full-logo" />
						<div class="absolute inset-y-0 flex items-center">
							<v-icon class="opacity-0" ref="miniLogo" name="deserve-mini-logo" />
						</div>
					</a>
				</div>
				<div class="flex justify-end items-center">
					<a class="btn text-gray-300 uppercase text-xs tracking-widest" href="#">
						<v-icon name="chat-bubble-outline" />
						<span>Обсудить</span>
					</a>
				</div>
			</div>
		</div>
		<transition :duration="1000">
			<div class="desktop-menu overflow-hidden h-12" v-if="menu">
				<div class="container h-full">
					<hr class="menu-separator block w-full h-px bg-white/20">
					<div class="menu-content flex items-center justify-center h-full">
						<nav class="flex space-x-14 h-full uppercase tracking-rr text-xs font-light">
							<a class="flex items-center h-full text-white hover:opacity-60 transition-opacity" href="#">Об агентстве</a>
							<a class="flex items-center h-full text-white hover:opacity-60 transition-opacity" href="#">Порфолио</a>
							<a class="flex items-center h-full text-white hover:opacity-60 transition-opacity" href="#">Вакансии</a>
							<a class="flex items-center h-full text-white hover:opacity-60 transition-opacity" href="#">Контакты</a>
						</nav>
					</div>
				</div>
			</div>
		</transition>
	</header>
</template>

<script>

	import gsap from 'gsap'
	import { ScrollTrigger } from 'gsap/ScrollTrigger'

	export default {
		data () {
			return {
				menu: false
			}
		},
		mounted () {
			gsap.registerPlugin(ScrollTrigger)

			const timeline = gsap.timeline()
			timeline.to(this.$refs.fullLogo.$el, { opacity: 0 }, 0).addLabel('start');
			timeline.to(this.$refs.miniLogo.$el, { opacity: 1 }, 'start-=80%') // 20% after 'start'
			timeline.to(this.$refs.logoWrapper, { height: 58 }, 'start-=50%')
			timeline.to(this.$refs.miniLogo.$el, { scale: .7 }, 'start-=50%')

			ScrollTrigger.create({
				animation: timeline,
				trigger: document.getElementById('header_scroll_marker'),
				start: 'top top',
				end: '100%',
				scrub: true
			})
		}
	}

</script>

<style lang="scss">

	.section-header {
		.desktop-menu {
			&.v-leave-active {
				transition: height .5s ease .4s;

				.menu-content { transition: transform .5s ease .2s }
				.menu-separator { transition: transform .3s ease-in-out }
			}
			&.v-enter-active {
				transition: height .5s ease;

				.menu-content { transition: transform .5s ease .1s }
				.menu-separator { transition: transform .5s ease .1s }
			}
			&.v-enter, &.v-leave-to {
				height: 0;

				.menu-content { transform: translateY(-50px) }
				.menu-separator { transform: scaleX(0) }
			}
			&.v-leave-to .menu-separator { transform: scaleX(0) }
		}
	}

</style>
