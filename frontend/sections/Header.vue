<template>
	<header class="section-header fixed inset-0 z-30">
		<div class="h-[88px]" ref="spacer">
			<div class="overflow-hidden absolute inset-x-0 top-0 bg-black/30 backdrop-blur-lg backdrop-saturate-150 h-[inherit] backdrop-extended" ref="backdrop">
				<transition name="menu" :duration="{ leave: 600 }">
					<div class="h-screen flex items-center relative" v-show="menu">
						<div class="container">
							<div class="grid grid-cols-2">
								<ul class="mx-auto text-4xl space-y-10 font-thin tracking-[.25rem]">
									<li class="menu-item">
										<a class="menu-item-magnetic inline-block" href="#">Главная</a>
									</li>
									<li class="menu-item">
										<a class="menu-item-magnetic inline-block" href="#">Об агентстве</a>
									</li>
									<li class="menu-item">
										<a class="menu-item-magnetic inline-block" href="#">Портфолио</a>
									</li>
									<li class="menu-item">
										<a class="menu-item-magnetic inline-block" href="#">Вакансии</a>
									</li>
									<li class="menu-item">
										<a class="menu-item-magnetic inline-block" href="#">Контакты</a>
									</li>
								</ul>
								<div class="form-column mx-auto">
									<h2 class="uppercase text-2xl font-extralight tracking-rr">Обратный звонок</h2>
									<p class="mt-6 text-gray-400 tracking-widest text-sm font-extralight leading-normal">Заполните форму ниже и мы обязательно свяжемся <br> с вами в ближайшее время.</p>

									<form class="mt-10 space-y-8" action="#">
										<div>
											<v-input type="text" name="name">
												<template v-slot:label>Как к Вам обращаться?</template>
											</v-input>
										</div>
										<div>
											<v-input type="text" name="phone">
												<template v-slot:label>Ваш номер телефона</template>
											</v-input>
										</div>
										<div>
											<button class="btn space-x-4 mt-6" type="submit" ref="submitFormBtn">
												<div class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-400 text-gray-400" ref="submitFormBtnPill">
													<v-icon name="chevron-right" />
												</div>
												<span class="text-xs tracking-rr uppercase text-white font-extralight">Отправить</span>
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="menu-bottom absolute inset-x-0 bottom-10">
							<div class="container flex items-center">
								<div>
									<a class="text-gray-400 hover:text-white transition-colors" href="https://instagram.com" target="_blank" title="Наш Instagram">
										<v-icon name="instagram" />
									</a>
								</div>
								<div class="ml-auto flex items-center space-x-10">
									<a class="text-gray-500 text-xs tracking-widest" href="#">Политика конфиденциальности</a>
									<p class="uppercase tracking-rr text-xs">Made by Deserve</p>
								</div>
							</div>
						</div>
					</div>
				</transition>
			</div>

			<!-- Desktop navigation bar -->
			<div class="container relative z-10 h-full">
				<div class="grid grid-cols-3 h-full">
					<div class="flex items-center">
						<button class="btn" @click="menu = !menu">
							<v-icon class="mb-1" name="menu" />
							<div class="relative uppercase text-xs tracking-[.25rem]">
								<span class="font-normal" v-if="!menu">Menu</span>
								<span class="font-normal" v-else>Закрыть</span>
							</div>
						</button>
					</div>

					<div class="flex justify-center">
						<nuxt-link class="h-full flex justify-center items-center relative text-white" to="/">
							<v-icon ref="fullLogo" name="deserve-full-logo" />
							<div class="absolute inset-y-0 flex items-center">
								<v-icon class="opacity-0 w-[75px]" ref="miniLogo" name="deserve-mini-logo" />
							</div>
						</nuxt-link>
					</div>

					<div class="flex justify-end items-center">
						<a class="btn uppercase text-xs sm:text-[.6rem] tracking-[.25rem] sm:tracking-rr" href="#">
							<span class="font-light">Обсудить</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>
</template>

<script>

	import gsap from 'gsap'
	import { ScrollTrigger } from 'gsap/ScrollTrigger'
	import disableScroll from 'disable-scroll'

	/* Register header scroll animation  */
	const initScrollTrigger = function () {
		gsap.registerPlugin(ScrollTrigger)

		const timeline = gsap.timeline()
		timeline.to(this.$refs.fullLogo.$el, { opacity: 0 }, 0).addLabel('start');
		timeline.to(this.$refs.miniLogo.$el, { opacity: 1 }, 'start-=80%') // 20% after 'start'
		timeline.to(this.$refs.spacer, { height: 58 }, 'start-=50%')
		timeline.to(this.$refs.miniLogo.$el, { scale: .7 }, 'start-=50%')

		ScrollTrigger.create({
			animation: timeline,
			trigger: document.getElementById('header_scroll_marker'),
			start: 'top top',
			end: '100%',
			scrub: true
		})
	}

	export default {
		data () {
			return {
				menu: true
			}
		},
		watch: {
			menu (value) {
				value ? disableScroll.on() : disableScroll.off()

				const backdrop = this.$refs.backdrop
				this.$refs.backdrop.classList.add('backdrop-extending')
				this.$refs.backdrop.addEventListener('transitionend', () => {
					backdrop.classList.remove('backdrop-extending')
				})

				if (value) {
					this.$refs.backdrop.classList.add('backdrop-extended')
				} else {
					this.$refs.backdrop.classList.remove('backdrop-extended')
				}
			}
		},
		mounted () {
			initScrollTrigger.call(this)
		}
	}

</script>

<style lang="scss" scoped>

	.section-header {
		pointer-events: none;

		& > *:not(.pointer-events-none) {
			pointer-events: auto;
		}
	}

	.backdrop-extending {
		transition: height .6s ease, background-color 1s ease;
	}

	.backdrop-extended {
		height: 100%;
		background-color: #000;
	}

	.menu {
		will-change: transform, opacity;

		.menu-item {
			will-change: transform, opacity;
		}
		.menu-bottom {
			will-change: opacity;
		}
	}

	.menu-enter-active {
		transition: opacity .6s ease .1s;

		.menu-item {
			transition: transform .3s ease-out, opacity .5s ease;

			@for $i from 1 through 5 {
				&:nth-child(#{$i}) {
					transition-delay: #{$i * .075}s;
				}
			}
		}
		.form-column {
			transition: transform .6s ease-out .2s, opacity .6s ease .2s;
		}
		.menu-bottom {
			transition: opacity .3s ease .5s;
		}
	}

	.menu-enter {
		.menu-item {
			transform: translate3d(0, -20px, 0);
			opacity: 0;
		}
		.form-column {
			transform: scale(.95);
			opacity: 0;
		}
		.menu-bottom {
			opacity: 0;
		}
	}

</style>
