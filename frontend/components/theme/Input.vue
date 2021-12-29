<template>
	<div class="relative">
		<label>
			<div class="label absolute inset-0 flex items-center pointer-events-none" :class="{ 'label-above': focusOrFilled }">
				<span class="block font-extralight tracking-wider text-gray-400">
					<slot name="label"></slot>
				</span>
			</div>

			<input
				class="form-control block w-full border-b border-gray-400 py-2 font-extralight tracking-wider" :type="type"
				@focus="focusOrFilled = true"
				@blur="loseFocus"
				:name="name"
				v-if="type != 'textarea'"
				v-model="value"
			>
			<textarea class="block w-full" v-else :name="name"></textarea>
		</label>
	</div>
</template>

<script>

	export default {
		props: {
			type: String,
			name: String
		},
		data () {
			return {
				focusOrFilled: false,
				value: ''
			}
		},
		methods: {
			loseFocus () {
				if (!this.value) {
					this.focusOrFilled = false
				}
			}
		}
	}

</script>

<style lang="scss" scoped>


	.label {
		transition: transform .25s ease;
		transform-origin: 0;
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
