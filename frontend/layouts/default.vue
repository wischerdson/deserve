<template>
	<div>
		<preloader v-if="isProduction" />

		<div id="header_scroll_marker" class="absolute top-11 inset-x-0 h-80 pointer-events-none z-0"></div>
		<section-header />
		<nuxt class="min-h-screen" />
		<section-footer />
	</div>
</template>

<script>

	import SectionHeader from '~/sections/Header'
	import SectionFooter from '~/sections/Footer'
	import Preloader from '~/components/Preloader'

	export default {
		components: { SectionHeader, SectionFooter, Preloader },
		data () {
			return {
				isProduction: process.env.NODE_ENV === 'production'
			}
		}
	}

</script>
