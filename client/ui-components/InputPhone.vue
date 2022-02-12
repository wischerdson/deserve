<template>
	<base-input :label="label" :value="phone" @input="$emit('input', $event)">
		<template #input="props">
			<input
				class="ui-base-input__input"
				type="tel"
				:name="name"
				@input="onInput"
				:id="props.id"
				ref="input"
			>
		</template>
	</base-input>
</template>

<script>

	import BaseInput from './BaseInput'
	import { AsYouType } from 'libphonenumber-js'

	export default {
		components: { BaseInput },
		props: {
			name: String,
			value: { type: String, default: '' },
			label: { type: String, default: '' }
		},
		data () {
			return {
				phone: this.value
			}
		},
		methods: {
			onInput (e) {
				const value = e.target.value
				const asYouType = new AsYouType('RU')

				asYouType.input(value)

				this.$refs.input.value = asYouType.formattedOutput

				if (asYouType.getNumber()) {
					this.phone = asYouType.getNumber().number
				}
			}
		},
		mounted () {
			this.asYouType = new AsYouType('RU')
			this.$refs.input.value = this.asYouType.input(this.value)
		}
	}

</script>
