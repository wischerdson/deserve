
export default {
	// Target: https://go.nuxtjs.dev/config-target
	target: 'static',

	// Global page headers: https://go.nuxtjs.dev/config-head
	head: {
		title: 'deserve',
		meta: [
			{ charset: 'utf-8' },
			{ name: 'viewport', content: 'width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, maximum-scale=1.0' },
			{ name: 'HandheldFriendly', content: 'True' },
			{ name: 'apple-mobile-web-app-capable', content: 'yes' },
			{ name: 'apple-mobile-web-app-status-bar-style', content: 'black-translucent' },
			{ name: 'apple-mobile-web-app-status-bar-style', content: 'black-translucent' },
			{ name: 'format-detection', content: 'telephone=no' },
			{ name: 'msapplication-TileColor', content: '#ffffff' },
			{ name: 'msapplication-TileImage', content: '/favicon/ms-icon-144x144.png' },
			{ name: 'theme-color', content: '#ffffff' },
			{ description: 'Добро пожаловать в наш мир. Мы - Deserve, креативное digital агентство. Мы предлагаем различные виды цифровых услуг.' },

			{ property: 'og:site_name', content: 'Deserve agency', hid: 'og-site_name' },
			{ property: 'og:url', content: 'https://deserve.ru', hid: 'og-url' },
			{ property: 'og:description', content: 'Добро пожаловать в наш мир. Мы - Deserve, креативное digital агентство. Мы предлагаем различные виды цифровых услуг.', hid: 'og-description' },
			{ property: 'og:image', content: '/og-image.png', hid: 'og-image' },
		],
		link: [
			{ rel: 'apple-touch-icon', sizes: '57x57', href: '/favicon/apple-icon-57x57.png' },
			{ rel: 'apple-touch-icon', sizes: '60x60', href: '/favicon/apple-icon-60x60.png' },
			{ rel: 'apple-touch-icon', sizes: '72x72', href: '/favicon/apple-icon-72x72.png' },
			{ rel: 'apple-touch-icon', sizes: '76x76', href: '/favicon/apple-icon-76x76.png' },
			{ rel: 'apple-touch-icon', sizes: '114x114', href: '/favicon/apple-icon-114x114.png' },
			{ rel: 'apple-touch-icon', sizes: '120x120', href: '/favicon/apple-icon-120x120.png' },
			{ rel: 'apple-touch-icon', sizes: '144x144', href: '/favicon/apple-icon-144x144.png' },
			{ rel: 'apple-touch-icon', sizes: '152x152', href: '/favicon/apple-icon-152x152.png' },
			{ rel: 'apple-touch-icon', sizes: '180x180', href: '/favicon/apple-icon-180x180.png' },

			{ rel: 'icon', type: 'image/png', sizes: '192x192', href: '/favicon/android-icon-192x192.png' },
			{ rel: 'icon', type: 'image/png', sizes: '32x32', href: '/favicon/favicon-32x32.png' },
			{ rel: 'icon', type: 'image/png', sizes: '96x96', href: '/favicon/favicon-96x96.png' },
			{ rel: 'icon', type: 'image/png', sizes: '16x16', href: '/favicon/favicon-16x16.png' },

			{ rel: 'manifest', href: '/favicon/manifest.json' },
		]
	},

	// Global CSS: https://go.nuxtjs.dev/config-css
	css: [
		// "vue-slick-carousel/dist/vue-slick-carousel.css",
		"slick-carousel/slick/slick.css",
		"aos/dist/aos.css",
		"@/assets/sass/app.scss",
	],

	// Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
	plugins: [
		{src:  '@/plugins/smooth-scroll', ssr: false},
		{src:  '@/plugins/cursor', ssr: false},
		{src:  '@/plugins/slick', ssr: false},
		{src:  '@/plugins/jarallax', ssr: false},
		{src:  '@/plugins/router'},
	],

	// Auto import components: https://go.nuxtjs.dev/config-components
	components: true,

	// Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
	buildModules: [
		'@nuxtjs/svg',
		// '@nuxtjs/pwa'
	],

	// Modules: https://go.nuxtjs.dev/config-modules
	modules: [
		// https://go.nuxtjs.dev/axios
		'@nuxtjs/axios',
		// '@nuxtjs/pwa',

		[
			'nuxt-i18n',
			{
				defaultLocale: 'ru',
				skipSettingLocaleOnNavigate: true,
				langDir: '@/lang/',
				lazy: true,
				locales: [
					{ code: 'en', iso: 'en-US', file: 'en.js', dir: 'ltr' },
					{ code: 'ru', iso: 'ru-RU', file: 'ru.js', dir: 'ltr' }
				]
			}
		]
	],

	// Axios module configuration: https://go.nuxtjs.dev/config-axios
	axios: {},

	// PWA module configuration: https://go.nuxtjs.dev/pwa
	// pwa: {
	// 	manifest: {
	// 		lang: 'en'
	// 	},
	// 	icon: {
	// 		source: '/static/icon.png'
	// 	},
	// 	meta: {
	// 		ogHost: 'deserve.ru',
	// 		ogImage: {
	// 			path: '/og-image.png',
	// 			type: 'image/png'
	// 		}
	// 	}
	// },

	// Build Configuration: https://go.nuxtjs.dev/config-build
	build: {
		extractCSS: true,
		optimization: {
			splitChunks: {
				cacheGroups: {
					styles: {
						name: 'styles',
						test: /\.(css|vue)$/,
						chunks: 'all',
						enforce: true
					}
				}
			}
		}
	}
}
