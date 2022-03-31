<template>
	<transition name="menu" :duration="{ leave: 600 }" @before-enter="beforeEnter" @after-leave="afterLeave">
		<div class="header__menu-desktop h-screen flex items-center relative" v-show="opened">
			<div class="container">
				<div class="grid grid-cols-2 items-center">
					<ul class="mx-auto text-3xl space-y-12 font-extralight text-gray-200 tracking-[.45rem] leading-none uppercase">
						<li class="menu-item">
							<v-action class="menu-item__link inline-block transition-opacity hover:opacity-70" to="/">Главная</v-action>
						</li>
						<li class="menu-item">
							<v-action class="menu-item__link inline-block transition-opacity hover:opacity-70" to="/about">Об агентстве</v-action>
						</li>
						<li class="menu-item">
							<v-action class="menu-item__link inline-block transition-opacity hover:opacity-70" to="/portfolio">Портфолио</v-action>
						</li>
						<li class="menu-item">
							<v-action class="menu-item__link inline-block transition-opacity hover:opacity-70" to="/vacancies">Вакансии</v-action>
						</li>
						<li class="menu-item">
							<v-action class="menu-item__link inline-block transition-opacity hover:opacity-70" to="/contacts">Контакты</v-action>
						</li>
					</ul>
					<div class="mx-auto">
						<form-callback :animate="animateForm" @close="$emit('close')" />
					</div>
				</div>
			</div>
			<div class="menu-bottom absolute inset-x-0 bottom-10">
				<div class="container flex items-center">
					<div class="flex items-center space-x-4">
						<a class="text-gray-400 hover:text-white transition-colors" href="https://www.instagram.com/deserve_ru/" target="_blank" title="Наш Instagram" area-label="Наш Instagram">
							<v-icon name="instagram" />
						</a>
						<a class="text-gray-400 hover:text-white transition-colors" href="https://vk.com/deserve_ru/" target="_blank" title="Наш Vk" area-label="Наш Vk">
							<v-icon name="vk" />
						</a>
					</div>
					<div class="ml-auto flex items-center space-x-10">
						<nuxt-link class="text-gray-500 text-xs tracking-widest hover:text-gray-400" exact to="/legal/privacy-policy" rel="nofollow">Политика конфиденциальности</nuxt-link>
					</div>
				</div>
			</div>
		</div>
	</transition>
</template>

<script>

	import FormCallback from "./FormCallback.vue"
	import { disablePageScroll, enablePageScroll, addFillGapTarget } from 'scroll-lock'

	export default {
		props: {
			opened: Boolean
		},
		components: { FormCallback },
		data () {
			return {
				animateForm: this.opened
			}
		},
		methods: {
			beforeEnter () {
				disablePageScroll(this.$el)
				this.animateForm = true
			},
			afterLeave () {
				enablePageScroll()
				this.animateForm = false
			}
		},
		mounted () {
			addFillGapTarget(this.$el)
		}
	}

</script>

<style lang="scss" scoped>

	.menu {
		&-enter-active {
			transition: opacity .6s ease .1s;

			.menu-item {
				transition: transform .3s ease-out, opacity .5s ease;

				@for $i from 1 through 5 {
					&:nth-child(#{$i}) {
						transition-delay: #{$i * .075}s;
					}
				}
			}

			.menu-bottom {
				transition: opacity .3s ease .5s;
			}
		}

		&-enter {
			.menu-item {
				transform: translate3d(0, -20px, 0);
				opacity: 0;
			}

			.menu-bottom {
				opacity: 0;
			}
		}
	}

	.header__menu-desktop .menu-item__link:before {
		left: -30px;
	}

</style>
