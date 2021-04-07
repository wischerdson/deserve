
export default {
	// Target: https://go.nuxtjs.dev/config-target
	target: 'static',

	// Global page headers: https://go.nuxtjs.dev/config-head
	head: {
		title: 'deserve',
		meta: [
			{ charset: 'utf-8' },
			{ name: 'viewport', content: 'width=device-width, initial-scale=1' },
		],
		link: [
			// { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
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
		'@nuxtjs/pwa'
	],

	// Modules: https://go.nuxtjs.dev/config-modules
	modules: [
		// https://go.nuxtjs.dev/axios
		'@nuxtjs/axios',
		'@nuxtjs/pwa',

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
	pwa: {
		manifest: {
			lang: 'en'
		},
		icon: {
			source: '/static/icon.png'
		},
		meta: {
			ogHost: 'deserve.ru',
			ogImage: {
				path: '/og-image.png',
				type: 'image/png'
			}
		}
	},

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
