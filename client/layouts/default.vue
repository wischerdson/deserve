<template>
	<div>
		<preloader v-if="isProduction" />

		<div id="header_scroll_marker" class="absolute top-11 inset-x-0 h-72 pointer-events-none z-0"></div>
		<section-header />
		<nuxt class="min-h-screen" />
		<section-footer />
	</div>
</template>

<script>

	import SectionHeader from '~/sections/header/_Header'
	import SectionFooter from '~/sections/Footer'
	import Preloader from '~/components/Preloader'

	export default {
		components: { SectionHeader, SectionFooter, Preloader },
		head () {
			return {
				bodyAttrs: { style: 'background-color: #000; color: #fff;' }
			}
		},
		data () {
			return {
				isProduction: process.env.NODE_ENV === 'production'
			}
		},
		mounted () {
			(function(d, w, c) {
				w.ChatraID = 'SkRahKFZfhGLomvMe';
				var s = d.createElement('script');
				w[c] = w[c] || function() {
					(w[c].q = w[c].q || []).push(arguments);
				};
				s.async = true;
				s.src = 'https://call.chatra.io/chatra.js';
				if (d.head) d.head.appendChild(s);
			})(document, window, 'Chatra');
		}
	}

</script>
