import Vue from 'vue'

const components = {
	Icon: require('~/ui-components/Icon').default,
	Input: require('~/ui-components/Input').default,
	Select: require('~/ui-components/Select').default,
	Textarea: require('~/ui-components/Textarea').default,
	InputFile: require('~/ui-components/InputFile').default,
	InputPhone: require('~/ui-components/InputPhone').default,
	AnimatedTick: require('~/ui-components/AnimatedTick').default
}

Object.entries(components).forEach(([name, component]) => {
	Vue.component('V' + name, component)
})
