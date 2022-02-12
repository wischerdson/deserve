<template>
	<div class="ui-base-input pt-5">
		<div class="relative">
			<slot name="input" :id="id" :value="ownValue" :on-input="onInput" />

			<label
				class="ui-base-input__label absolute inset-x-0 leading-none pointer-events-none"
				:class="{ 'at-top': ownValue }"
				:for="id"
			>
				<span class="font-extralight tracking-wider text-gray-200">{{ label }}</span>
			</label>

			<slot name="default" />

			<div class="ui-base-input__underline default"></div>
			<div class="ui-base-input__underline focus"></div>
		</div>
	</div>
</template>

<script>

	export default {
		props: {
			value: String,
			label: { type: String, default: '' }
		},
		data () {
			return {
				ownValue: this.value,
				id: null
			}
		},
		watch: {
			value (value) {
				this.ownValue = value
			},
			ownValue (value) {
				this.$emit('input', value)
			}
		},
		methods: {
			onInput (e) {
				this.ownValue = e.target.value
			}
		},
		mounted () {
			this.id = `ui_component_${this.$el.__vue__._uid}`
		}
	}

</script>
