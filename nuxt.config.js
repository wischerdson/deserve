export default {
	// Target: https://go.nuxtjs.dev/config-target
	target: 'static',

	// Global page headers: https://go.nuxtjs.dev/config-head
	head: {
		title: 'deserve',
		meta: [
			{ charset: 'utf-8' },
			{ name: 'viewport', content: 'width=device-width, initial-scale=1' },
			{ hid: 'description', name: 'description', content: '' }
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
		"@nuxtjs/svg"
	],

	// Modules: https://go.nuxtjs.dev/config-modules
	modules: [
		// https://go.nuxtjs.dev/axios
		'@nuxtjs/axios',
		// https://go.nuxtjs.dev/pwa
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
			source: '@/static/icon.png'
		},
		meta: {
			ogHost: 'deserve.ru',
			ogImage: '@/static/og-image.png'
		}
	},

	/*<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">*/

	// Build Configuration: https://go.nuxtjs.dev/config-build
	build: {
		// transpile: ['smooth-scroll'],
		// vendor: [
		// 	'smooth-scroll'
		// ]
	}
}
