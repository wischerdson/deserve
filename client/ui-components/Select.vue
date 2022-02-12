<template>
	<base-input :label="label" :value="value" @input="$emit('input', $event)">
		<template #input="props">
			<select
				class="ui-base-input__input cursor-pointer"
				:name="name"
				:id="props.id"
				:value="props.value"
				@input="props.onInput"
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
		props: {
			name: String,
			value: String,
			label: { type: String, default: '' }
		}
	}

</script>
