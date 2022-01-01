import intlTelInput from 'intl-tel-input'
import utils from 'intl-tel-input/build/js/utils'

const defaultConfig = {
	utilsScript: utils,
	preferredCountries: ['ru', 'ua', 'kz', 'by']
}

const intlTelInputWrapper = function (element, config) {
	config = Object.assign({}, defaultConfig, config)

	return intlTelInput(element, config)
}

export default ({}, inject) => {
	inject('intlTelInput', intlTelInputWrapper)
}
