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
		'~/assets/sass/app.scss'
	],

	// Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
	plugins: [
		{ src: '~/plugins/components.js' },
		{ src: '~/plugins/magnetic.js', ssr: false },
		{ src: '~/plugins/video-bg.js', ssr: false },
		{ src: '~/plugins/smooth-scroll.js', ssr: false },
		{ src: '~/plugins/intl-tel-input.js', ssr: false },
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
		// extractCSS: true,
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
