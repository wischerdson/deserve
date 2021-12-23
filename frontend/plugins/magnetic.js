const Magnetic = function () {
	this.constuctor = () => {
		this.magnets = []

		document.addEventListener('mousemove', (e) => {
			this.magnets.forEach((magnet) => this.__render(e, magnet))
		})

		document.addEventListener('scroll', () => {
			this.magnets.forEach((magnet) => this.__computePosition(magnet))
		})

		return this
	}

	this.add = (config) => {
		if (!(config.element instanceof HTMLElement)) {
			throw 'MagneticJS: Magnet element is invalid. It must have "HTMLElement" type'
		}

		config.powerDistance = config.powerDistance || 30

		this.magnets.push(this.__preflight(config))
	}

	this.__render = (event, magnet) => {
		const mouse = { x: event.clientX, y: event.clientY }
		const x = magnet.x + magnet.width/2
		const y = magnet.y + magnet.height/2
		mouse.distance = Math.sqrt((mouse.x - x)**2 + (mouse.y - y)**2)

		if (mouse.distance < magnet.magneticArea) {
			const percent = 1 - mouse.distance/magnet.magneticArea
			const translate = {
				x: (mouse.x - x)*percent,
				y: (mouse.y - y)*percent
			}

			magnet.element.style.transform = `translate3d(${translate.x}px, ${translate.y}px, 0)`
			return
		}

		magnet.element.style.transform = ''
	}

	this.__preflight = ({ element, powerDistance }) => {
		element.style.transition = 'transform 0.6s cubic-bezier(0.075, 0.82, 0.165, 1)'
		element.style.willChange = 'transform'

		if (window.getComputedStyle(element).display === 'inline') {
			throw 'MagneticJS: The element "display" css property should be different from "inline"'
		}

		const boundingRect = element.getBoundingClientRect()

		const magnet = { element, powerDistance }
		magnet.width = boundingRect.width
		magnet.height = boundingRect.height
		magnet.diagonal = Math.sqrt(magnet.width**2 + magnet.height**2)
		magnet.magneticArea = (magnet.diagonal + magnet.powerDistance)/2
		this.__computePosition(magnet)

		return magnet
	}

	this.__computePosition = (magnet) => {
		const boundingRect = magnet.element.getBoundingClientRect()
		magnet.x = boundingRect.x
		magnet.y = boundingRect.y
	}

	this.constuctor(...arguments)
}

export default ({ app }, inject) => {
	inject('magnetic', new Magnetic())
}
