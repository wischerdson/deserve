import Vue from 'vue'
import Icon from '~/components/theme/Icon.vue'

const components = { Icon }

Object.entries(components).forEach(([name, component]) => {
	Vue.component('V' + name, component)
})
