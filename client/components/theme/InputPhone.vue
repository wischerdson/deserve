<template>
	<input
		type="tel"
		ref="input"
		@focus="focus = true"
		@blur="focus = false"
		:name="name"
		@input="formatted = $event.target.value"
	>
</template>

<script>

	import Cleave from 'cleave.js'
	require('cleave.js/dist/addons/cleave-phone.i18n')

	export default {
		props: {
			type: String,
			name: String
		},
		data () {
			return {
				formatted: '',
				value: '',
				focus: false,
				iti: null
			}
		},
		watch: {
			focus (focus) {
				focus ? this.$emit('focus') : this.$emit('blur')

				if (focus && !this.formatted) {
					const code = this.iti.getSelectedCountryData().dialCode
					const tip = `+${code}`
					this.$refs.input.value = tip
					this.formatted = tip
				}
			},
			formatted (value) {
				this.$emit('input', this.iti.getNumber())
			}
		},
		mounted () {
			const input = this.$refs.input

			this.formatted = input.value
			this.iti = this.$intlTelInput(input, {
				allowDropdown: false,
				initialCountry: 'ru',
				formatOnDisplay: false,
				autoPlaceholder: false
			})

			const cleave = new Cleave(input, {
				phone: true,
				phoneRegionCode: this.iti.getSelectedCountryData().iso2
			})

			input.addEventListener('countrychange', () => {
				const country = this.iti.getSelectedCountryData().iso2

				if (country) {
					cleave.setPhoneRegionCode(country)
				}
			})
		}
	}

</script>
