<template>
	<div class="pt-5">
		<div class="relative">
			<label class="form-control-wrapper" :class="`input-${type}`">
				<input-phone
					class="form-control"
					v-if="type == 'phone'"
					v-model="innerValue"
				/>

				<textarea
					class="form-control"
					v-else-if="type == 'textarea'"
					:name="name"
					v-model="innerValue"
				></textarea>

				<div
					class="form-control"
					v-else-if="type == 'file'"
					:style="`height: ${standartInputHeight}px`"
				>
					<input-file
						:name="name"
						:multiple="multiple"
						v-model="innerValue"
					/>
					<div class="pointer-events-none flex items-center px-2 absolute right-0 top-0 bottom-0">
						<v-icon class="text-gray-500" name="attach-file" />
					</div>
				</div>

				<input
					class="form-control"
					v-else
					:type="type"
					:name="name"
					v-model="innerValue"
				>

				<div class="form-control-underline default"></div>
				<div class="form-control-underline focus"></div>

				<div
					class="form-label absolute inset-x-0 top-0 flex items-center pointer-events-none"
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
	import InputFile from './InputFile'

	export default {
		props: {
			type: String,
			name: String,
			value: String,
			multiple: { type: Boolean, default: false }
		},
		components: { InputPhone, InputFile },
		data () {
			return {
				innerValue: this.value,
				standartInputHeight: 41
			}
		},
		watch: {
			innerValue (value) {
				this.$emit('input', value)
			}
		}
	}

</script>
