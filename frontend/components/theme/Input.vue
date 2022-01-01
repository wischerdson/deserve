<template>
	<div class="relative">
		<label>
			<div class="label absolute inset-0 flex items-center pointer-events-none" :class="{ 'label-above': focusOrFilled }">
				<span class="block font-extralight tracking-wider text-gray-400">
					<slot name="label"></slot>
				</span>
			</div>

			<input-phone
				class="form-control block w-full border-b border-gray-400 py-2 font-extralight tracking-wider"
				@focus="focus = true"
				@blur="focus = false"
				v-if="type == 'phone'"
				v-model="value"
			/>

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

	import InputPhone from './InputPhone'

	export default {
		props: {
			type: String,
			name: String
		},
		components: { InputPhone },
		data () {
			return {
				value: '',
				focus: false,
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
	.form-control {
		transition: border-color .25s ease;
	}
	.form-control:focus {
		border-color: #fff;
	}

</style>
