import Vue from 'vue'
import Icon from '~/components/theme/Icon.vue'
import Breadcrumb from '~/components/theme/Breadcrumb.vue'
import Input from '~/components/theme/Input.vue'
import Action from '~/components/theme/Action.vue'
import Magnetic from '~/components/theme/Magnetic.vue'

const components = { Icon, Breadcrumb, Input, Action, Magnetic }

Object.entries(components).forEach(([name, component]) => {
	Vue.component('V' + name, component)
})
