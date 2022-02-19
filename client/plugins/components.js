import Vue from 'vue'

const components = {
	Input: require('~/ui-components/Input').default,
	Select: require('~/ui-components/Select').default,
	Textarea: require('~/ui-components/Textarea').default,
	InputFile: require('~/ui-components/InputFile').default,
	InputPhone: require('~/ui-components/InputPhone').default,
	AnimatedTick: require('~/ui-components/AnimatedTick').default,
	Icon: require('~/ui-components/Icon').default,
	Action: require('~/ui-components/Action').default,
	ActionPill: require('~/ui-components/ActionPill').default
}

Object.entries(components).forEach(([name, component]) => {
	Vue.component('V' + name, component)
})
