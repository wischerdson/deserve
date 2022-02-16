<template>
	<base-input
		:label="label"
		:value="value"
		:errors="errors"
		:success="success"
		:showTickOnSuccess="false"
		@input="$emit('modelInput', $event)"
	>
		<template #input="props">
			<textarea
				class="ui-base-input__input"
				@input="props.onInput"
				:value="value"
				:id="props.id"
				v-on="$listeners"
				v-bind="$attrs"
			></textarea>
		</template>
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
			value: [ String, Number ],
			label: { type: String, default: '' },
			errors: { type: Object, required: false },
			success: { default: false, required: false }
		}
	}

</script>
