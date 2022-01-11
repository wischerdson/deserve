<template>
	<div class="pt-5">
		<div class="relative">
			<label>
				<input-phone
					:class="inputClass"
					v-if="type == 'phone'"
					v-model="innerValue"
				/>

				<textarea
					:class="inputClass"
					v-else-if="type == 'textarea'"
					:name="name"
					v-model="innerValue"
				></textarea>

				<input
					:class="inputClass"
					v-else
					:type="type"
					:name="name"
					v-model="innerValue"
				>

				<div
					class="label absolute inset-x-0 top-0 flex items-center pointer-events-none"
					:class="{ 'on-focus': innerValue }"
					:style="`height: ${standartInputHeight}px`"
				>
					<span class="block font-extralight tracking-wider text-gray-400">
						<slot name="label"></slot>
					</span>
				</div>
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
				standartInputHeight: 41,
				inputClass: 'form-control block w-full border-b border-gray-400 py-2 font-extralight tracking-wider'
			}
		},
		watch: {
			innerValue (value) {
				this.$emit('input', value)
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

	.label.on-focus,
	.form-control:focus + .label {
		transform: translateY(calc(-50% - 7px)) scale(.9);
	}

	textarea.form-control {
		min-height: 100px;
	}

	.form-control {
		transition: border-color .25s ease;

		&:focus {
			border-color: #fff;
		}
	}

</style>
