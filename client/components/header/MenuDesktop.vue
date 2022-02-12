<template>
	<div class="header__menu-desktop h-screen flex items-center relative">
		<div class="container">
			<div class="grid grid-cols-2 items-center">
				<ul class="mx-auto text-3xl space-y-12 font-extralight text-gray-200 tracking-[.45rem] leading-none uppercase">
					<li class="menu-item">
						<nuxt-link class="btn menu-item__link inline-block transition-opacity hover:opacity-70" exact to="/">Главная</nuxt-link>
					</li>
					<li class="menu-item">
						<nuxt-link class="btn menu-item__link inline-block transition-opacity hover:opacity-70" exact to="/about">Об агентстве</nuxt-link>
					</li>
					<li class="menu-item">
						<nuxt-link class="btn menu-item__link inline-block transition-opacity hover:opacity-70" exact to="/portfolio">Портфолио</nuxt-link>
					</li>
					<li class="menu-item">
						<nuxt-link class="btn menu-item__link inline-block transition-opacity hover:opacity-70" exact to="/vacancies">Вакансии</nuxt-link>
					</li>
					<li class="menu-item">
						<nuxt-link class="btn menu-item__link inline-block transition-opacity hover:opacity-70" exact to="/contacts">Контакты</nuxt-link>
					</li>
				</ul>
				<div class="mx-auto">
					<callback-form :enable-animation="opened" />
				</div>
			</div>
		</div>
		<div class="menu-bottom absolute inset-x-0 bottom-10">
			<div class="container flex items-center">
				<div>
					<a class="text-gray-400 hover:text-white transition-colors" href="https://www.instagram.com/deserve_ru/" target="_blank" title="Наш Instagram" area-label="Наш Instagram">
						<v-icon name="instagram" />
					</a>
				</div>
				<div class="ml-auto flex items-center space-x-10">
					<nuxt-link class="text-gray-500 text-xs tracking-widest hover:text-gray-400" exact to="/legal/privacy-policy">Политика конфиденциальности</nuxt-link>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	import CallbackForm from "./CallbackForm.vue"

	export default {
		props: {
			opened: Boolean
		},
		components: { CallbackForm }
	}

</script>

<style lang="scss" scoped>

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

		.menu-bottom {
			transition: opacity .3s ease .5s;
		}
	}

	.menu-enter {
		.menu-item {
			transform: translate3d(0, -20px, 0);
			opacity: 0;
		}

		.menu-bottom {
			opacity: 0;
		}
	}

	.header__menu-desktop .menu-item__link:before {
		left: -30px;
	}

</style>
