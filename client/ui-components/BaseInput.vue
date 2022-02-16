<template>
	<div class="ui-base-input relative pt-5 pb-5">
		<div class="relative">
			<slot name="input" :id="id" :value="ownValue" :on-input="onInput" />

			<label
				class="ui-base-input__label absolute inset-x-0 leading-none pointer-events-none"
				:class="{ 'at-top': ownValue || forceFilled }"
				:for="id"
			>
				<span class="font-extralight tracking-wider text-gray-200">{{ label }}</span>
			</label>

			<slot name="default" />

			<div class="pointer-events-none flex items-center px-2 absolute right-0 top-0 bottom-0" v-if="showTickOnSuccess && success">
				<v-icon class="text-green-700" name="done" />
			</div>

			<div class="ui-base-input__underline default"></div>
			<div class="ui-base-input__underline focus"></div>
			<div class="ui-base-input__underline error" :class="{ show: error }" v-if="errors"></div>
			<div class="ui-base-input__underline success" :class="{ show: success }"></div>
		</div>

		<div class="mt-0.5 leading-none absolute bottom-0 h-5 overflow-hidden flex items-end" v-if="errors">
			<transition name="error" :duration="300">
				<span class="message text-xs font-normal tracking-wider text-red-500" v-if="error">{{ error }}</span>
			</transition>
		</div>
	</div>
</template>

<script>

	export default {
		props: {
			value: [ String, Number ],
			label: { type: String, default: '', required: false },
			forceFilled: { default: false, required: false },
			errors: { type: Object, required: false },
			success: { default: false, required: false },
			showTickOnSuccess: { type: Boolean, default: true, required: false }
		},
		data () {
			return {
				ownValue: this.value,
				id: null
			}
		},
		computed: {
			error () {
				return Object.keys(this.errors).find((item) => this.errors[item]) || null
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

<style lang="scss" scoped>

	.error {
		&-enter-active, &-leave-active {
			transition: transform .3s ease;
		}

		&-enter, &-leave-to {
			transform: translateY(-20px);
		}
	}

</style>
