const colors = require('tailwindcss/colors')

module.exports = {
	content: [
		'./components/**/*.{vue,js}',
		'./layouts/**/*.vue',
		'./pages/**/*.vue',
		'./sections/**/*.vue',
		'./plugins/**/*.js',
		'./nuxt.config.js'
	],
	theme: {
		extend: {
			colors: {
				gray: colors.zinc
			},
			spacing: {
				full: '100%',
				'1/2': '50%'
			},
			letterSpacing: {
				rr: '.1666rem'
			}
		},
		fontFamily: {
			sans: 'Helvetica Neue, sans-serif',
		},
		screens: {
			'2xl': {'max': '1535px'},
			'xl': {'max': '1279px'},
			'lg': {'max': '1023px'},
			'md': {'max': '767px'},
			'sm': {'max': '639px'},
		}
	},
	variants: {
		extend: {},
	},
	plugins: [],
}
