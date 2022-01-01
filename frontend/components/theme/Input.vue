<template>
	<div class="relative">
		<label>
			<div class="label absolute inset-0 flex items-center pointer-events-none" :class="{ 'label-above': focusOrFilled }">
				<span class="block font-extralight tracking-wider text-gray-400">
					<slot name="label"></slot>
				</span>
			</div>


				<input
					class="form-control block w-full border-b border-gray-400 py-2 font-extralight tracking-wider"
					type="tel"
					ref="phoneInput"
					@focus="focus = true"
					@blur="focus = false"
					:name="name"
					@input="value = $event.target.value"
					 v-if="type == 'phone'"
				>

			<textarea class="block w-full" v-else-if="type == 'textarea'" :name="name"></textarea>
			<input
				class="form-control block w-full border-b border-gray-400 py-2 font-extralight tracking-wider"
				v-else
				:type="type"
				@focus="focus = true"
				@blur="focus = false"
				:name="name"
				v-model="value"
			>
		</label>
	</div>
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
				value: '',
				focus: false,
				iti: null
			}
		},
		computed: {
			focusOrFilled () {
				return this.value || this.focus
			}
		},
		mounted () {
			const input = this.$refs.phoneInput

			if (input) {
				this.value = input.value
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
	}

</script>

<style lang="scss" scoped>

	.label {
		transition: transform .25s ease;
		transform-origin: 0;
		will-change: transform;
	}
	.label-above {
		transform: translateY(calc(-50% - 7px)) scale(.9);
	}
	.form-control {
		transition: border-color .25s ease;
	}
	.form-control:focus {
		border-color: #fff;
	}

</style>
