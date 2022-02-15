<template>
	<base-input :label="label" :value="value" @input="$emit('input', $event)">
		<template #input="props">
			<input
				class="ui-base-input__input"
				:type="type"
				:name="name"
				v-model="props.value"
				:value="props.value"
				@input="props.onInput"
				:id="props.id"
				v-on="$listeners"
				v-bind="$attrs"
			>
		</template>
	</base-input>
</template>

<script>

	import BaseInput from './BaseInput'

	export default {
		components: { BaseInput },
		inheritAttrs: false,
		props: {
			type: String,
			name: String,
			value: String,
			label: { type: String, default: '' }
		}
	}

</script>
