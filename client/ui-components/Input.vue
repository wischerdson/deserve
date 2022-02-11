<template>
	<base-input :label="label" :value="value" @input="$emit('input', $event)">
		<template #input="props">
			<input
				class="ui-base-input-component__input"
				:type="type"
				:name="name"
				:value="props.value"
				@input="props.onInput"
				:id="props.id"
			>
		</template>
	</base-input>
</template>

<script>

	import BaseInput from './BaseInput'

	export default {
		components: { BaseInput },
		props: {
			type: String,
			name: String,
			value: String,
			label: { type: String, default: '' }
		}
	}

</script>
