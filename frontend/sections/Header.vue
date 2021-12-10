<template>
	<header class="section-header fixed inset-x-0 top-0 z-30 bg-black/30 backdrop-filter backdrop-blur-lg">
		<div class="container">
			<div class="grid grid-cols-3">
				<div class="h-full flex items-center">
					<button class="btn text-gray-300 uppercase text-xs tracking-widest space-x-2" @click="menu = !menu">
						<Icon class="mb-1" name="menu" />
						<span>Menu</span>
					</button>
				</div>
				<div class="flex justify-center">
					<a class="flex justify-center items-center relative text-white h-[5.5rem]" ref="logoWrapper" href="/">
						<Icon ref="fullLogo" name="deserve-full-logo" />
						<div class="absolute inset-y-0 flex items-center">
							<Icon class="opacity-0" ref="miniLogo" name="deserve-mini-logo" />
						</div>
					</a>
				</div>
				<div class="flex justify-end items-center">
					<a class="btn space-x-2 text-gray-300 uppercase text-xs tracking-widest rounded-md" href="#">
						<Icon name="chat-bubble-outline" />
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
							<a class="flex items-center h-full text-white hover:opacity-60 transition transition-opacity" href="#">Об агентстве</a>
							<a class="flex items-center h-full text-white hover:opacity-60 transition transition-opacity" href="#">Порфолио</a>
							<a class="flex items-center h-full text-white hover:opacity-60 transition transition-opacity" href="#">Вакансии</a>
							<a class="flex items-center h-full text-white hover:opacity-60 transition transition-opacity" href="#">Контакты</a>
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
			timeline.to(this.$refs.fullLogo.$el, { opacity: 0 }, 0)
			timeline.from(this.$refs.miniLogo.$el, { scale: .95 }, 0)
			timeline.to(this.$refs.miniLogo.$el, { opacity: 1 }, 0)
			timeline.to(this.$refs.miniLogo.$el, { scale: .7 }, '30%')
			timeline.to(this.$refs.logoWrapper, { height: 58 }, '30%')

			ScrollTrigger.create({
				animation: timeline,
				trigger: this.$el,
				start: 'center top',
				end: '300%',
				scrub: true,
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
