export default {
	// Target: https://go.nuxtjs.dev/config-target
	target: 'static',

	// Global page headers: https://go.nuxtjs.dev/config-head
	head: {
		htmlAttrs: {
			lang: 'en'
		},
		meta: [
			{ charset: 'utf-8' },
			{ name: 'viewport', content: 'width=device-width, initial-scale=1' },
			{ hid: 'description', name: 'description', content: '' },
			{ name: 'format-detection', content: 'telephone=no' }
		],
		link: [
			{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
		]
	},

	// Global CSS: https://go.nuxtjs.dev/config-css
	css: [
		// https://michalsnik.github.io/aos/
		'aos/dist/aos.css',
		// https://swiperjs.com
		'swiper/css',

		'~/assets/sass/app.scss'
	],

	// Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
	plugins: [
		{ src: '~/plugins/components.js' },
		{ src: '~/plugins/aos.js', ssr: false },
		{ src: '~/plugins/magnetic.js', ssr: false },
		{ src: '~/plugins/swiper.js', ssr: false },
		{ src: '~/plugins/video-bg.js', ssr: false },
		{ src: '~/plugins/smooth-scroll.js', ssr: false },
	],

	// Auto import components: https://go.nuxtjs.dev/config-components
	components: false,

	// Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
	buildModules: [
		'@nuxt/postcss8',
	],

	// Modules: https://go.nuxtjs.dev/config-modules
	modules: [
	],

	// Build Configuration: https://go.nuxtjs.dev/config-build
	build: {
		extractCSS: true,
		transpile: ['gsap'],
		postcss: {
			plugins: {
				tailwindcss: {},
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
