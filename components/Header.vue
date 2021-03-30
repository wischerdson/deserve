<template>
	<header id="section_header" :class="{'transparent-in-top': $store.state.header.transparent}">
		<div class="desktop">
			<transition>
				<div class="menu" v-show="menu">
					<button class="close-btn" title="Закрыть" @click="menu = false">
						<svg fill="currentColor" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
					</button>
					<div class="scrollable-content">
						<div class="container">
							<ul class="link-list">
								<li class="link-item">
									<nuxt-link exact to="/" active-class="active">Главная</nuxt-link>
									<p>— Get to know us better</p>
								</li>
								<li class="link-item">
									<a href="#">Об агентстве</a>
									<p>— Get to know us better</p>
								</li>
								<li class="link-item">
									<a href="#">Услуги</a>
									<p>— Perfect-reasonable</p>
								</li>
								<li class="link-item">
									<a href="#">Портфолио</a>
									<p>— The completed path is the reward. ©S.J.</p>
								</li>
								<li class="link-item">
									<a href="#">Вакансии</a>
									<p>— Join the crew</p>
								</li>
								<li class="link-item">
									<nuxt-link exact to="/contacts" active-class="active">Контакты</nuxt-link>
									<p>— You are always welcome</p>
								</li>
							</ul>
							<div class="social-links">
								<a href="#">Instagram</a>
								<a href="#">Behance</a>
								<a href="#">Telegram</a>
							</div>
							<div class="menu-footer">
								<div class="documents-links">
									<a href="#">Энигма</a>
									<a href="#">Правила пользования</a>
								</div>
								<div class="contacts">
									<div class="company-name">Deserve agency</div>
									<a href="#" class="email">corp@deserve.ru</a>
									<a href="#" class="phone">+7 910 112 71-74</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</transition>
			<div class="container">
				<div class="flex-content">
					<div class="left">
						<div class="logo">
							<nuxt-link to="/">
								<img src="@/assets/img/logo-deserve-white-dot.svg" alt="">
							</nuxt-link>
						</div>
						<div class="text" v-html="$t('header.digital-agency')"></div>
					</div>
					<div class="right">
						<div class="phone">
							<a href="">+7 910 112 71-74</a>
						</div>
						<div class="langs">
							<nuxt-link class="lang" :class="{active: $i18n.locale == 'ru'}" :to="switchLocalePath('ru')">RU</nuxt-link>
							<nuxt-link class="lang" :class="{active: $i18n.locale == 'en'}" :to="switchLocalePath('en')">EN</nuxt-link>
						</div>
						<a href="#" class="btn btn-line btn-white btn-sm">{{ $t('header.contact-us') }}</a>
						<!-- <a href="#" class="btn btn-line btn-white btn-sm" dict="header.conractUs"></a> -->

						<button class="btn menu-btn" @click="menu = true">
							<svg fill="currentColor" viewBox="0 -53 384 384" xmlns="http://www.w3.org/2000/svg"><path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/></svg>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="mobile"></div>
	</header>

</template>

<script>
	import $ from 'jquery'

	export default {
		data () {
			return {
				menu: false,
				documentScrolledAt: 0
			}
		},
		watch: {
			menu (v) {
				if (v) {
					this.documentScrolledAt = $(window).scrollTop()
					$('body').css({'overflow': 'hidden'})
				} else {
					$('body').css({'overflow': ''})
					$(window).scrollTop(this.documentScrolledAt)
				}
			},
			$route (v) {
				this.menu = false
			}
		},
		mounted () {
			$(document).scroll((e) => {
				const scroll = $(window).scrollTop()

				/* Header */
				const header = $('#section_header.transparent-in-top')
				scroll > 0 ? header.addClass('scrolled') : header.removeClass('scrolled')

				/* Scroll top button */
				const scrollTop = $('.scroll-top')
				scroll < $(window).height() ? scrollTop.addClass('hidden') : scrollTop.removeClass('hidden')
			})
		}
	}
</script>