<template>
	<base-input :label="label" :value="value" @input="$emit('modelInput', $event)">
		<template #input="props">
			<select
				class="ui-base-input__input cursor-pointer"
				:id="props.id"
				:value="value"
				@input="props.onInput"
				v-on="$listeners"
				v-bind="$attrs"
			>
				<slot />
			</select>
		</template>
		<div class="pointer-events-none flex items-center px-2 absolute right-0 top-0 bottom-0">
			<v-icon class="text-gray-400" name="expand-more" />
		</div>
	</base-input>
</template>

<script>

	import BaseInput from './BaseInput'

	export default {
		components: { BaseInput },
		inheritAttrs: false,
		model: {
			event: 'modelInput'
		},
		props: {
			value: String,
			label: { type: String, default: '' }
		}
	}

</script>
