<template>
	<popup :opened="true" v-if="false" />
</template>

<script>
	
	import Popup from '@/components/quiz/Popup'

	export default {
		components: { Popup }
	}

</script>