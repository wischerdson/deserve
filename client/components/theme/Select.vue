<template>
	<div class="pt-5">
		<div class="relative">
			<label class="form-control-wrapper">
				<select
					class="form-control block w-full py-2 tracking-wider"
					:value="value"
					@input="$emit('input', $event.target.value)" :name="name"
					ref="select"
				>
					<slot />
				</select>

				<div class="pointer-events-none flex items-center px-2 absolute right-0 top-0 bottom-0">
					<v-icon class="text-gray-400" name="expand-more" />
				</div>

				<div class="form-control-underline default"></div>
				<div class="form-control-underline focus"></div>

				<div
					class="label absolute inset-x-0 top-0 bottom-0 flex items-center pointer-events-none"
					:class="{ 'on-focus': label }"
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

	export default {
		props: {
			name: { type: String, default: '', required: false },
			value: { type: String }
		},
		data () {
			return {
				label: false
			}
		},
		watch: {
			value (value) {
				this.label = !!value
			}
		},
		mounted () {
			this.label = !!this.$refs.select.value
		}
	}

</script>

<style lang="scss">

	select.form-control {
		font-weight: 200;
		cursor: pointer;

		option {
			font-weight: normal;
		}
	}

	.label {
		transition: transform .25s ease;
		transform-origin: 0;
		will-change: transform;
	}

	.label.on-focus,
	select.form-control:focus + .label {
		transform: translateY(calc(-50% - 7px)) scale(.9);
	}

</style>
