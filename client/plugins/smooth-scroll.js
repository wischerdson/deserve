import SmoothScroll from 'smooth-scroll'

export default ({ app }, inject) => {
	const SCREEN_LG = 1023
	const DESKTOP_OFFSET = 25
	const MOBILE_OFFSET = -170

	const smoothScroll = new SmoothScroll('a[href*="#"]', {
		header: '.section-header',
		offset: () => window.innerWidth > SCREEN_LG ? DESKTOP_OFFSET : MOBILE_OFFSET,
		speedAsDuration: true
	})

	inject('smoothScroll', smoothScroll)
}
