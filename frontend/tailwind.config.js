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
				gray: colors.zincNeutral
			},
			spacing: {
				full: '100%',
				'1/2': '50%'
			},
			letterSpacing: {
				rr: '.1666rem'
			},
			fontSize: {
				xs: ['0.75rem', '1'],
				sm: ['0.875rem', '1'],
				base: ['1rem', '1'],
				lg: ['1.125rem', '1'],
				xl: ['1.25rem', '1'],
				'2xl': ['1.5rem', '1'],
			},
			willChange: {
				opacity: 'opacity',
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
	plugins: [],
}
