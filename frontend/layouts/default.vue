<template>
	<div class="font-light">
		<HeaderSection />

		<Nuxt />

		<FooterSection />
	</div>
</template>

<script>

	import HeaderSection from '~/sections/Header'
	import FooterSection from '~/sections/Footer'

	export default {
		components: { HeaderSection, FooterSection }
	}

</script>
