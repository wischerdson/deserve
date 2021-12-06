const colors = require('tailwindcss/colors')

module.exports = {
	purge: [
		'./components/**/*.{vue,js}',
		'./layouts/**/*.vue',
		'./pages/**/*.vue',
		'./sections/**/*.vue',
		'./plugins/**/*.js',
		'./nuxt.config.js'
	],
	darkMode: false, // or 'media' or 'class'
	mode: 'jit',
	theme: {
		extend: {
			colors: {
				gray: colors.trueGray
			},
			spacing: {
				full: '100%',
				'1/2': '50%'
			}
		},
		fontFamily: {
			sans: 'SF UI Display, sans-serif',
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
