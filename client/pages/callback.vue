<!-- Страница с формой обратного звонка	 -->
<template>
	<div class="min-h-screen flex items-center">
		<div class="container max-w-sm">
			<callback-form :animate="true" @close="$router.push('/')" />
		</div>
	</div>
</template>

<script>

import CallbackForm from '~/sections/header/FormCallback'

export default {
	components: { CallbackForm }
}

</script>
