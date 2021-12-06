import Aos from 'aos'

export default () => {
	Aos.init({
		once: true,
		duration: 800,
		disable: process.env.NODE_ENV !== 'production'
	})
}
