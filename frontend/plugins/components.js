import Vue from 'vue'
import Icon from '~/components/theme/Icon.vue'
import Breadcrumb from '~/components/theme/Breadcrumb.vue'
import Input from '~/components/theme/Input.vue'

const components = { Icon, Breadcrumb, Input }

Object.entries(components).forEach(([name, component]) => {
	Vue.component('V' + name, component)
})
