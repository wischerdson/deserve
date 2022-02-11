import Vue from 'vue'
import Icon from '~/ui-components/Icon'
import Input from '~/ui-components/Input'
import Select from '~/ui-components/Select'
import Textarea from '~/ui-components/Textarea'
import InputFile from '~/ui-components/InputFile'
import InputPhone from '~/ui-components/InputPhone'

const components = { Icon, Input, Select, Textarea, InputFile, InputPhone }

Object.entries(components).forEach(([name, component]) => {
	Vue.component('V' + name, component)
})
