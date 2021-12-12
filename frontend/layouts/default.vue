<template>
	<div>
		<div id="header_scroll_marker" class="absolute top-11 inset-x-0 h-80 pointer-events-none z-0"></div>
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
