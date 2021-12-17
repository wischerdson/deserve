import 'youtube-background'

const videoBg = (...args) => {
	console.log()
	return new VideoBackgrounds(...args)
}

export default ({ app }, inject) => {
	inject('videoBg', videoBg)
}
