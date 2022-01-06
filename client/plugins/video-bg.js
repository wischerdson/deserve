import 'youtube-background'

const videoBg = (...args) => {
	return new VideoBackgrounds(...args)
}

export default ({ app }, inject) => {
	inject('videoBg', videoBg)
}
