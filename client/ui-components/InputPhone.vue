<template>
	<base-input
		:label="label"
		:force-filled="formatted"
		:value="phone"
		:errors="errors"
		:success="success"
		@input="$emit('modelInput', $event)"
	>
		<template #input="props">
			<input
				class="ui-base-input__input"
				type="tel"
				@focus="onFocus"
				@input="onInput"
				:id="props.id"
				ref="input"
				v-on="$listeners"
				v-bind="$attrs"
			>
		</template>
	</base-input>
</template>

<script>

	import BaseInput from './BaseInput'
	import { AsYouType } from 'libphonenumber-js'

	export default {
		components: { BaseInput },
		inheritAttrs: false,
		model: {
			event: 'modelInput'
		},
		props: {
			value: { type: String, default: '' },
			label: { type: String, default: '' },
			errors: { type: Object, required: false },
			success: { default: false, required: false }
		},
		data () {
			return {
				phone: this.value,
				formatted: null
			}
		},
		watch: {
			formatted (value) {
				this.$refs.input.value = value
			}
		},
		methods: {
			onFocus (e) {
				if (!e.target.value) {
					e.target.value = '+7'
					this.onInput(e)
				}
			},
			onInput (e) {
				const value = e.target.value
				const asYouType = new AsYouType('RU')

				asYouType.input(value)

				this.formatted = asYouType.formattedOutput
				this.phone = asYouType.getNumber() ? asYouType.getNumber().number : value
			}
		},
		mounted () {
			this.asYouType = new AsYouType('RU')
			this.formatted = this.asYouType.input(this.value)
		}
	}

</script>
