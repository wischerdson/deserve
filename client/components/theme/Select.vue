<template>
	<div class="pt-5">
		<div class="relative">
			<label>
				<select
					class="form-control block w-full border-b border-gray-400 py-2 tracking-wider"
					:value="value"
					@input="$emit('input', $event.target.value)" :name="name"
				>
					<slot />
				</select>

				<div class="flex items-center px-2 absolute right-0 top-0 bottom-0">
					<v-icon class="text-gray-400" name="expand-more" />
				</div>

				<div
					class="label absolute inset-x-0 top-0 bottom-0 flex items-center pointer-events-none"
					:class="{ 'on-focus': value }"
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
		}
	}

</script>

<style lang="scss">

	select.form-control {
		transition: border-color .25s ease;
		font-weight: 200;

		option {
			font-weight: normal;
		}
		&:focus {
			border-color: #fff;
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
