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
				gray: colors.neutral,
				telegram: '#0088cc',
				whatsapp: '#43d854',
			},
			spacing: {
				full: '100%',
				'1/2': '50%'
			},
			letterSpacing: {
				rr: '.1666rem'
			},
			fontSize: {
				'2xs': ['0.5rem', '1'],
				xs: ['0.75rem', '1'],
				sm: ['0.875rem', '1'],
				base: ['1rem', '1'],
				lg: ['1.125rem', '1'],
				xl: ['1.25rem', '1'],
				'2xl': ['1.5rem', '1'],
			},
			willChange: {
				opacity: 'opacity',
			},
			padding: {
				'1/3': '33.333333%',
				'2/3': '66.666667%',
				'1/4': '25%',
				'2/4': '50%',
				'3/4': '75%',
				'1/5': '20%',
				'2/5': '40%',
				'3/5': '60%',
				'4/5': '80%',
				'1/6': '16.666667%',
				'2/6': '33.333333%',
				'3/6': '50%',
				'4/6': '66.666667%',
				'5/6': '83.333333%',
				'1/12': '8.333333%',
				'2/12': '16.666667%',
				'3/12': '25%',
				'4/12': '33.333333%',
				'5/12': '41.666667%',
				'6/12': '50%',
				'7/12': '58.333333%',
				'8/12': '66.666667%',
				'9/12': '75%',
				'10/12': '83.333333%',
				'11/12': '91.666667%',
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
