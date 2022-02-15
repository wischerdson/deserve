export default {
	// Target: https://go.nuxtjs.dev/config-target
	target: 'static',

	vue: {
		config: {
			productionTip: false
		}
	},

	publicRuntimeConfig: {
		axios: {
			debug: process.env.NODE_ENV !== 'production',
			https: process.env.HTTP_SECURE,
			browserBaseURL: process.env.BROWSER_BASE_URL
		}
	},

	// Global page headers: https://go.nuxtjs.dev/config-head
	head: {
		htmlAttrs: {
			lang: 'ru-RU'
		},
		meta: [
			{ charset: 'utf-8' },
			{ name: 'viewport', content: 'width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, maximum-scale=1.0' },
			{ name: 'HandheldFriendly', content: 'True' },
			{ name: 'apple-mobile-web-app-capable', content: 'yes' },
			{ name: 'apple-mobile-web-app-status-bar-style', content: 'black' },
			{ name: 'format-detection', content: 'telephone=no' },
			{ name: 'format-detection', content: 'address=no' },
			{ name: 'msapplication-TileColor', content: '#ffffff' },
			{ name: 'msapplication-TileImage', content: '/favicon/ms-icon-144x144.png' },
			{ name: 'theme-color', content: '#ffffff' },
			{ description: 'Добро пожаловать в наш мир. Мы - Deserve, креативное digital агентство. Мы предлагаем различные виды цифровых услуг.' },
			{ property: 'og:site_name', content: 'Deserve agency', hid: 'og-site_name' },
			{ property: 'og:url', content: 'https://deserve.ru', hid: 'og-url' },
			{ property: 'og:description', content: 'Добро пожаловать в наш мир. Мы - Deserve, креативное digital агентство. Мы предлагаем различные виды цифровых услуг.', hid: 'og-description' },
			{ property: 'og:image', content: '/og-image.png', hid: 'og-image' },
			{ property: 'og:locale', content: 'ru_RU', hid: 'og-locale' },
		],
		link: [
			{ rel: 'apple-touch-icon', sizes: '180x180', href: '/favicon/apple-touch-icon.png' },
			{ rel: 'icon', type: 'image/svg+xml', href: '/favicon/safari-pinned-tab.svg' },
			{ rel: 'icon', type: 'image/png', sizes: '16x16', href: '/favicon/favicon-16x16.png' },
			{ rel: 'icon', type: 'image/png', sizes: '32x32', href: '/favicon/favicon-32x32.png' },
			{ rel: 'icon', type: 'image/png', sizes: '192x192', href: '/favicon/favicon-192x192.png' },
			{ rel: 'icon', type: 'image/png', sizes: '194x194', href: '/favicon/favicon-194x194.png' },
			{ rel: 'icon', type: 'image/png', sizes: '96x96', href: '/favicon/favicon-96x96.png' },
			{ rel: 'manifest', href: '/favicon/site.webmanifest' },
			{ rel: 'mask-icon', href: '/favicon/safari-pinned-tab.svg', color: '#7c7c7c' },
			{ rel: 'shortcut icon', href: '/favicon.ico' },
			{ name: 'msapplication-TileColor', content: '#000000' },
			{ name: 'msapplication-config', content: '/favicon/browserconfig.xml' },
			{ name: 'theme-color', content: '#ffffff' },
		]
	},

	// Global CSS: https://go.nuxtjs.dev/config-css
	css: [
		'~/assets/sass/app.scss'
	],

	// Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
	plugins: [
		{ src: '~/plugins/components.js' },
		{ src: '~/plugins/magnetic.js', ssr: false },
		{ src: '~/plugins/video-bg.js', ssr: false },
		{ src: '~/plugins/smooth-scroll.js', ssr: false },
	],

	// Auto import components: https://go.nuxtjs.dev/config-components
	components: false,

	// Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
	buildModules: [
		'@nuxt/postcss8'
	],

	// Modules: https://go.nuxtjs.dev/config-modules
	modules: [
		'@nuxtjs/axios'
	],

	// Build Configuration: https://go.nuxtjs.dev/config-build
	build: {
		extractCSS: true,
		transpile: ['gsap'],
		postcss: {
			plugins: {
				// https://tailwindcss.nuxtjs.org/options
				tailwindcss: {
					config: './client/tailwind.config.js',
					// cssPath: resolve(__dirname, 'assets/tailwind.css'),
					exposeConfig: true
				},
				autoprefixer: {},
			},
		},
	},

	generate: {
		dir: '../public/dist'
	},

	server: {
		host: '0.0.0.0'
	},

	watchers: {
		webpack: {
			aggregateTimeout: 300,
			poll: 1000
		}
	}
}
