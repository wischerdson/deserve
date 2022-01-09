<template>
	<div class="pt-5">
		<div class="relative">
			<label>
				<div
					class="label absolute inset-x-0 top-0 flex items-center pointer-events-none"
					:class="{ 'label-above': focusOrFilled }"
					:style="`height: ${standartInputHeight}px`"
				>
					<span class="block font-extralight tracking-wider text-gray-400">
						<slot name="label"></slot>
					</span>
				</div>

				<input-phone
					class="form-control block w-full border-b border-gray-400 py-2 font-extralight tracking-wider"
					@focus="focus = true"
					@blur="focus = false"
					v-if="type == 'phone'"
					v-model="innerValue"
				/>

				<textarea
					class="form-control block w-full border-b border-gray-400 py-2 font-extralight tracking-wider"
					v-else-if="type == 'textarea'"
					@focus="focus = true"
					@blur="focus = false"
					:name="name"
					v-model="innerValue"
				></textarea>

				<input
					class="form-control block w-full border-b border-gray-400 py-2 font-extralight tracking-wider"
					v-else
					:type="type"
					@focus="focus = true"
					@blur="focus = false"
					:name="name"
					v-model="innerValue"
				>
			</label>
		</div>
	</div>
</template>

<script>

	import InputPhone from './InputPhone'

	export default {
		props: {
			type: String,
			name: String,
			value: String
		},
		components: { InputPhone },
		data () {
			return {
				innerValue: this.value,
				focus: false,
				standartInputHeight: 41
			}
		},
		watch: {
			innerValue (value) {
				this.$emit('input', value)
			}
		},
		computed: {
			focusOrFilled () {
				return this.value || this.focus
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

	textarea.form-control {
		min-height: 100px;
	}

	.form-control {
		transition: border-color .25s ease;
	}

	.form-control:focus {
		border-color: #fff;
	}

</style>
