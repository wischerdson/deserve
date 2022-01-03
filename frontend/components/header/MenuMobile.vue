<template>
	<!-- Mobile menu -->
	<transition :duration="2000">
		<div class="mobile-menu absolute inset-0 z-20 hidden lg:block overflow-hidden" v-if="menu">
			<div
				class="menu-backdrop w-screen h-full bg-black will-change-transform"
				:style="`background-image: url(${require('~/static/image/header-menu-bg.jpeg')})`"
			>
				<div class="container h-full">
					<ul class="h-full flex flex-col items-end justify-center relative z-10 space-y-9">
						<li class="menu-item text-right pr-4">
							<nuxt-link class="uppercase opacity-50 hover:opacity-100 transition-opacity will-change-opacity text-white font-normal text-lg tracking-rr" exact to="/">Главная</nuxt-link>
						</li>
						<li class="menu-item text-right pr-4">
							<nuxt-link class="uppercase opacity-50 hover:opacity-100 transition-opacity will-change-opacity text-white font-normal text-lg tracking-rr" exact to="/about">Об агентстве</nuxt-link>
						</li>
						<li class="menu-item text-right pr-4">
							<a class="uppercase opacity-50 hover:opacity-100 transition-opacity will-change-opacity text-white font-normal text-lg tracking-rr" href="#">Порфолио</a>
						</li>
						<li class="menu-item text-right pr-4">
							<a class="uppercase opacity-50 hover:opacity-100 transition-opacity will-change-opacity text-white font-normal text-lg tracking-rr" href="#">Вакансии</a>
						</li>
						<li class="menu-item text-right pr-4">
							<nuxt-link class="uppercase opacity-50 hover:opacity-100 transition-opacity will-change-opacity text-white font-normal text-lg tracking-rr" exact to="/contacts">Контакты</nuxt-link>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</transition>
</template>

<script>

	export default {
		props: {
			menu: Boolean
		},
		model: {
			prop: 'menu',
			event: 'change'
		}
	}

</script>

<style lang="scss" scoped>

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
			.menu-backdrop { transition: transform .5s cubic-bezier(.76,.27,.38,.89); }
			.menu-item { transition: transform .6s cubic-bezier(0,.5,0,1), opacity .6s ease; }
			@include menu-item(.1);
		}
		&.v-leave-active {
			transition: right .5s cubic-bezier(.76,.27,.38,.89);
		}
		&.v-enter {
			.menu-backdrop { transform: translate3d(-100%, 0, 0); }
			.menu-item {
				transform: translate3d(-200vw, 0, 0);
				opacity: 0;
			}
		}
		&.v-leave-to {
			right: 100%;
		}
	}

</style>
