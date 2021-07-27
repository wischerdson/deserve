<template>
	<header id="section_header" :class="{'transparent-in-top': $store.state.header.transparent}">
		<div class="desktop">
			<div class="container">
				<div class="flex-content">
					<div class="left">
						<div class="logo">
							<nuxt-link :to="localePath('/')">
								<img src="@/static/img/logo-deserve-white-dot.svg" alt="">
							</nuxt-link>
						</div>
						<div class="text" v-html="$t('header.digital-agency')"></div>
					</div>
					<div class="right">
						<div class="phone">
							<a href="tel:89958808484">8 (995) 880 84-84</a>
						</div>
						<div class="langs">
							<nuxt-link class="lang" :class="{active: $i18n.locale == 'ru'}" :to="switchLocalePath('ru')">RU</nuxt-link>
							<nuxt-link class="lang" :class="{active: $i18n.locale == 'en'}" :to="switchLocalePath('en')">EN</nuxt-link>
						</div>
						<nuxt-link class="btn btn-line btn-white btn-sm" :to="localePath('feedback')">{{ $t('header.contact-us') }}</nuxt-link>
						<button class="btn menu-btn" @click="menu = true" v-html="require('@/assets/icons/menu.svg?raw')"></button>
					</div>
				</div>
			</div>
		</div>
		<div class="mobile">
			<div class="container">
				<div class="flex-content">
					<div class="logo">
						<nuxt-link to="/">
							<img src="@/static/img/logo-deserve-white-dot.svg" alt="">
						</nuxt-link>
					</div>
					<div class="left">
						<div class="langs">
							<nuxt-link class="lang" :class="{active: $i18n.locale == 'ru'}" :to="switchLocalePath('ru')">RU</nuxt-link>
							<nuxt-link class="lang" :class="{active: $i18n.locale == 'en'}" :to="switchLocalePath('en')">EN</nuxt-link>
						</div>
						<button class="btn menu-btn" @click="menu = true" v-html="require('@/assets/icons/menu.svg?raw')"></button>
					</div>
					
				</div>
			</div>
		</div>
		<transition>
			<div class="menu" v-show="menu">
				<button class="close-btn" title="Закрыть" @click="menu = false" v-html="require('@/assets/icons/close.svg?raw')">
					
				</button>
				<div class="scrollable-content">
					<div class="container">
						<ul class="link-list">
							<li class="link-item">
								<nuxt-link exact :to="localePath('/')" active-class="active">
									{{ $t('navigation-links.home') }}
								</nuxt-link>
								<p>— Where all started!</p>
							</li>
							<li class="link-item">
								<nuxt-link exact :to="localePath('/about')" active-class="active">
									{{ $t('navigation-links.about-agency') }}
								</nuxt-link>
								<a href=""></a>
								<p>— Get to know us better</p>
							</li>
							<li class="link-item">
								<nuxt-link exact :to="localePath('/services')" active-class="active">
									{{ $t('navigation-links.services') }}
								</nuxt-link>
								<p>— Perfect-reasonable</p>
							</li>
							<li class="link-item">
								<nuxt-link exact :to="localePath('/portfolio')" active-class="active">
									{{ $t('navigation-links.our-cases') }}
								</nuxt-link>
								<p>— The completed path is the reward. ©S.J.</p>
							</li>
							<li class="link-item">
								<nuxt-link exact :to="localePath('/vacancies')" active-class="active">
									{{ $t('navigation-links.open-jobs') }}
									<span class="index color-red">0</span>
								</nuxt-link>
								<p>— Join the crew</p>
							</li>
							<li class="link-item">
								<nuxt-link exact :to="localePath('/contacts')" active-class="active">{{ $t('navigation-links.contacts') }}</nuxt-link>
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
								<nuxt-link exact :to="localePath('/legal/data-processing-policy')" active-class="active">{{ $t('legal.data-processing-policy') }}</nuxt-link>
								<nuxt-link exact :to="localePath('/legal/privacy-policy')" active-class="active">{{ $t('legal.privacy-policy') }}</nuxt-link>
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
				const header = $('#section_header.transparent-in-top')
				scroll > 0 ? header.addClass('scrolled') : header.removeClass('scrolled')
			})
		}
	}
</script>