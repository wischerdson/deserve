<template>
	<base-input :label="label" :value="value" @input="$emit('input', $event)">
		<template #input="props">
			<input
				class="ui-base-input__input visually-hidden"
				type="file"
				:name="name"
				:value="props.value"
				@input="props.onInput"
				:id="props.id"
				ref="input"
				v-on="$listeners"
			>
		</template>

		<div @click="$refs.input.click()" style="height: 40px">
			<div class="pointer-events-none flex items-center px-2 absolute right-0 top-0 bottom-0">
				<v-icon class="text-gray-500" name="attach-file" />
			</div>
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
			label: { type: String, default: '' },
			multiple: { type: Boolean, default: false }
		}
	}

</script>
