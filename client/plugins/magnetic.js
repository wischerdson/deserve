const Magnetic = (() => {
	const PLUGIN_NAME = 'MagneticJS'

	const Magnet = function () {
		this.element = null

		this.trigger = null

		this.powerDistance = 50

		this.__isHtmlElement = (element, name) => {
			if (!(this.element instanceof HTMLElement)) {
				throw `${PLUGIN_NAME}: Option "${name}" is invalid. It must have "HTMLElement" type`
			}
		}

		this.constuctor = (config) => {
			Object.keys(config).forEach((key) => {
				this[key] = config[key]
			})

			this.__factory()
			this.__setScrollHandler()

			return this
		}

		this.setBoundingClientRect = () => {
			const magnetic = this.trigger || this.element
			this.boundingClientRect = magnetic.getBoundingClientRect()

			return this
		}

		this.computeDimensions = () => {
			this.width = this.boundingClientRect.width
			this.height = this.boundingClientRect.height

			return this
		}

		this.computeCenter = () => {
			this.center = {
				x: this.boundingClientRect.x + this.width/2,
				y: this.boundingClientRect.y + this.height/2
			}

			return this
		}

		this.computeMagneticZone = () => {
			this.zone = {
				radius: {
					x: this.width/2 + this.powerDistance,
					y: this.height/2 + this.powerDistance,
				}
			}

			return this
		}

		this.__factory = () => {
			this.__isHtmlElement(this.element, 'element')

			if (this.trigger !== null) {
				this.__isHtmlElement(this.trigger, 'trigger')
			}

			if (window.getComputedStyle(this.element).display === 'inline') {
				console.warn(`${PLUGIN_NAME}: The element "display" css property should be different from "inline"`);
			}

			this.element.style.transition = 'transform 0.6s cubic-bezier(0.075, 0.82, 0.165, 1)'
			this.element.style.willChange = 'transform'

			this.setBoundingClientRect()
				.computeDimensions()
				.computeCenter()
				.computeMagneticZone()
		}

		this.refresh = () => {
			this.__factory()
		}

		this.__setScrollHandler = () => {
			document.addEventListener('scroll', this.__scrollListener)
		}

		this.destroy = () => {
			document.removeEventListener('scroll', this.__scrollListener)
			this.element.style.transform = ''
			this.element.style.transition = ''
			this.element.style.willChange = ''
		}

		this.__scrollListener = () => {
			this.setBoundingClientRect().computeCenter()
		}

		this.constuctor(...arguments)
	}

	return function () {
		this.magnets = []

		this.constuctor = () => {
			document.addEventListener('mousemove', this.__mouseListener)

			return this
		}

		this.__mouseListener = (event) => {
			this.magnets.forEach((magnet) => this.__render(event, magnet))
		}

		this.destroy = () => {
			document.removeEventListener('mousemove', this.__mouseListener)
			this.magnets.forEach((magnet) => magnet.destroy())
			this.magnets = []
		}

		this.add = (config) => {
			const magnet = new Magnet(config)
			this.magnets.push(magnet)
			return magnet
		}

		this.__render = (event, magnet) => {
			const mouse = {
				x: event.clientX,
				y: event.clientY,
			}
			mouse.distance = {
				x: (mouse.x - magnet.center.x),
				y: (mouse.y - magnet.center.y),
			}
			mouse.distance.xAbs = Math.abs(mouse.distance.x)
			mouse.distance.yAbs = Math.abs(mouse.distance.y)

			if (
				mouse.distance.xAbs < magnet.zone.radius.x &&
				mouse.distance.yAbs < magnet.zone.radius.y
			) {
				const percent = {
					x: 1 - mouse.distance.xAbs/magnet.zone.radius.x,
					y: 1 - mouse.distance.yAbs/magnet.zone.radius.y,
				}

				const translate = {
					x: mouse.distance.x * percent.x*percent.y,
					y: mouse.distance.y * percent.x*percent.y,
				}

				magnet.element.style.transform = `translate3d(${translate.x}px, ${translate.y}px, 0)`
				return
			}

			magnet.element.style.transform = ''
		}

		this.constuctor(...arguments)
	}
})()

export default ({}, inject) => {
	inject('magnetic', new Magnetic())
}
