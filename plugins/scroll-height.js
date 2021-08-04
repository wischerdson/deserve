
const scrollHeight = () => {
	return Math.max(
		document.body.scrollHeight, document.documentElement.scrollHeight,
		document.body.offsetHeight, document.documentElement.offsetHeight,
		document.body.clientHeight, document.documentElement.clientHeight
	)
}

export default ({ app }, inject) => {
	inject('scrollHeight', scrollHeight)
}