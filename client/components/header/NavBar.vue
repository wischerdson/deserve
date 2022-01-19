<template>
	<div class="container relative z-10 h-full">
		<div class="grid grid-cols-3 h-full">
			<div class="flex items-center">
				<button class="btn lg:hidden transition-opacity hover:opacity-70" @click="$emit('change', !menu)">
					<v-icon class="mb-1" name="menu" />
					<div class="relative uppercase text-xs tracking-[.25rem]">
						<span class="font-normal" v-if="!menu">Menu</span>
						<span class="font-normal" v-else>Закрыть</span>
					</div>
				</button>
			</div>

			<div class="flex justify-center">
				<nuxt-link class="h-full flex justify-center items-center relative text-white" to="/">
					<v-icon ref="fullLogo" name="deserve-full-logo" />
					<div class="absolute inset-y-0 flex items-center">
						<v-icon class="opacity-0 w-[75px]" ref="miniLogo" name="deserve-mini-logo" />
					</div>
				</nuxt-link>
			</div>

			<div class="flex justify-end items-center">
				<button class="btn uppercase text-xs sm:text-[.6rem] tracking-[.25rem] sm:tracking-rr transition-opacity hover:opacity-70" @click="$emit('toggleContactUsSidebar')">
					<span class="font-light">Обсудить</span>
				</button>
			</div>
		</div>
	</div>
</template>

<script>

	import gsap from 'gsap'
	import { ScrollTrigger } from 'gsap/ScrollTrigger'

	export default {
		props: {
			menu: Boolean,
			contactUsSidebar: Boolean
		},
		model: {
			prop: 'menu',
			event: 'change'
		},
		mounted () {
			gsap.registerPlugin(ScrollTrigger)

			const timeline = gsap.timeline()
			timeline.to(this.$refs.fullLogo.$el, { opacity: 0 }, 0).addLabel('start');
			timeline.to(this.$refs.miniLogo.$el, { opacity: 1 }, 'start-=80%') // 20% after 'start'
			timeline.to(this.$refs.miniLogo.$el, { scale: .7 }, 'start-=50%')

			ScrollTrigger.create({
				animation: timeline,
				trigger: document.getElementById('header_scroll_marker'),
				start: 'top top',
				end: '100%',
				scrub: true
			})
		}
	}

</script>
