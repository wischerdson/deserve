module.exports = {
	mode: 'jit',
	purge: [
		'./components/**/*.{vue,js}',
		'./layouts/**/*.vue',
		'./pages/**/*.vue',
		'./plugins/**/*.{js,ts}',
		'./nuxt.config.{js,ts}',
	],
	darkMode: false, // or 'media' or 'class'
	theme: {
		extend: {
			zIndex: {
				'200': 200
			},
			colors: {
				primary: '#ea110c'
			}
		},
	},
	variants: {
		extend: {},
	},
	plugins: [],
}
