import Vue from 'vue'
import Icon from '~/components/theme/Icon.vue'
import Breadcrumb from '~/components/theme/Breadcrumb.vue'
import Input from '~/components/theme/Input.vue'
import Select from '~/components/theme/Select.vue'
import Action from '~/components/theme/Action.vue'
import Magnetic from '~/components/theme/Magnetic.vue'
import MagneticTrigger from '~/components/theme/MagneticTrigger.vue'

const components = { Icon, Breadcrumb, Input, Select, Action, Magnetic, MagneticTrigger }

Object.entries(components).forEach(([name, component]) => {
	Vue.component('V' + name, component)
})
