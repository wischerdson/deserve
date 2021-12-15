<template>
	<header class="section-header fixed inset-x-0 top-0 z-30 bg-black/30 backdrop-blur-lg backdrop-saturate-150">
		<!-- Desktop navigation bar -->
		<div class="container relative z-10">
			<div class="grid grid-cols-3">
				<div class="h-full flex items-center">
					<button class="btn text-gray-300 uppercase text-xs tracking-[.25rem] lg:hidden" @click="menu = !menu">
						<v-icon class="mb-1" name="menu" />
						<span class="font-normal">Menu</span>
					</button>
				</div>
				<div class="flex justify-center">
					<div class="h-[5.5rem]" ref="logoWrapper">
						<nuxt-link class="h-full flex justify-center items-center relative text-white" to="/">
							<v-icon ref="fullLogo" name="deserve-full-logo" />
							<div class="absolute inset-y-0 flex items-center">
								<v-icon class="opacity-0" ref="miniLogo" name="deserve-mini-logo" />
							</div>
						</nuxt-link>
					</div>

				</div>
				<div class="flex justify-end items-center">
					<a class="btn text-gray-300 uppercase text-xs tracking-[.25rem]" href="#">
						<v-icon name="chat-bubble-outline" />
						<span class="font-normal">Обсудить</span>
					</a>
				</div>
			</div>
		</div>

		<!-- Mobile menu button -->
		<div class="absolute inset-0 z-30 max-h-[88px] hidden lg:block pointer-events-none">
			<div class="container h-full">
				<div class="h-full flex items-center">
					<button class="btn text-gray-300 uppercase text-xs tracking-[.25rem] pointer-events-auto" @click="menu = !menu">
						<v-icon class="mb-1" name="menu" />
						<span class="font-normal">Menu</span>
					</button>
				</div>
			</div>
		</div>

		<!-- Desktop menu -->
		<transition :duration="1000">
			<div class="desktop-menu overflow-hidden h-12 lg:hidden" v-if="menu">
				<div class="container h-full">
					<hr class="menu-separator block w-full h-px bg-white/20">
					<div class="menu-content flex items-center justify-center h-full">
						<nav class="flex space-x-14 h-full uppercase tracking-[.25rem] text-xs font-light">
							<a class="flex items-center h-full text-white hover:opacity-60 transition-opacity" href="#">Об агентстве</a>
							<a class="flex items-center h-full text-white hover:opacity-60 transition-opacity" href="#">Порфолио</a>
							<a class="flex items-center h-full text-white hover:opacity-60 transition-opacity" href="#">Вакансии</a>
							<nuxt-link class="flex items-center h-full text-white hover:opacity-60 transition-opacity" to="contacts">Контакты</nuxt-link>
						</nav>
					</div>
				</div>
			</div>
		</transition>

		<!-- Mobile menu -->
		<transition :duration="2000">
			<div class="mobile-menu fixed inset-0 z-20 h-screen hidden lg:block" v-if="menu">
				<div class="menu-backdrop absolute inset-0 bg-black will-change-transform"></div>
				<div class="container h-full">
					<ul class="h-full flex flex-col items-end justify-center relative z-10 space-y-9">
						<li class="menu-item text-right pr-4">
							<nuxt-link class="uppercase opacity-50 hover:opacity-100 transition-opacity will-change-opacity text-white font-normal text-lg tracking-rr" to="/">Главная</nuxt-link>
						</li>
						<li class="menu-item text-right pr-4">
							<a class="uppercase opacity-50 hover:opacity-100 transition-opacity will-change-opacity text-white font-normal text-lg tracking-rr" href="#">Об агентстве</a>
						</li>
						<li class="menu-item text-right pr-4">
							<a class="uppercase opacity-50 hover:opacity-100 transition-opacity will-change-opacity text-white font-normal text-lg tracking-rr" href="#">Порфолио</a>
						</li>
						<li class="menu-item text-right pr-4">
							<a class="uppercase opacity-50 hover:opacity-100 transition-opacity will-change-opacity text-white font-normal text-lg tracking-rr" href="#">Вакансии</a>
						</li>
						<li class="menu-item text-right pr-4">
							<nuxt-link class="uppercase opacity-50 hover:opacity-100 transition-opacity will-change-opacity text-white font-normal text-lg tracking-rr" to="contacts">Контакты</nuxt-link>
						</li>
					</ul>
				</div>
			</div>
		</transition>
	</header>
</template>

<script>

	import gsap from 'gsap'
	import { ScrollTrigger } from 'gsap/ScrollTrigger'
	import disableScroll from 'disable-scroll'

	export default {
		data () {
			return {
				menu: false
			}
		},
		watch: {
			menu (value) {
				if (document.body.offsetWidth <= 1023) {
					value ? disableScroll.on() : disableScroll.off()
				}
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
		},
		beforeRouteLeave () {
			alert()
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

		@mixin menu-item($delay: 0) {
			$items: 5;

			@for $i from 1 through $items {
				.menu-item:nth-child(#{$i}) {
					transition-delay: #{$delay + (-$i + $items) * .1}s;
				}
			}
		}

		.mobile-menu {
			&.v-enter-active {
				.menu-backdrop { transition: transform .6s cubic-bezier(.76,.27,.38,.89); }
				.menu-item { transition: transform .7s cubic-bezier(0,.5,0,1), opacity .6s ease; }
				@include menu-item(.2);
			}
			&.v-leave-active {
				.menu-backdrop { transition: transform .6s cubic-bezier(.76,.27,.38,.89) .6s; }
				.menu-item { transition: transform .6s cubic-bezier(1,0,1,.5), opacity 2s ease; }
				@include menu-item();
			}
			&.v-enter, &.v-leave-to {
				.menu-backdrop { transform: translate3d(-100%, 0, 0); }
				.menu-item {
					transform: translate3d(-200vw, 0, 0);
					opacity: 0;
				}
			}
		}
	}

</style>
