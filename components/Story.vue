<template>
	<div class="videostory fixed bottom-6 left-6 transition-transform duration-500" :class="{
		'transform translate-x-10': shiftRight
	}">
		<button class="block relative origin-bottom-left rounded-2xl !shadow-xl transform transition-transform duration-300" :class="{
			'hover:scale-105': !scale,
			'scale-[2.25]': scale
		}" @click="scale = true">
			<div class="w-24 relative z-20" v-html="require('@/assets/icons/iphone-11.svg?raw')"></div>
			<div class="absolute inset-0 z-10 overflow-hidden rounded-2xl">
				<video class="object-center object-cover w-full h-full" :src="require('~/static/video/story-2.webm')" loop autoplay preload controlslist="nodownload" disablepictureinpicture playsinline preload="auto" muted ref="video"></video>
			</div>
		</button>
	</div>
</template>

<script>
	
	import $ from 'jquery'

	export default {
		data: () => ({
			scale: false,
			pause: false,
			shiftRight: false
		}),
		watch: {
			scale (value) {
				if (value) {
					this.$refs.video.currentTime = 0

					setTimeout(() => {
						document.addEventListener('click', this.scaleOut)
					}, 10)
				} else {
					document.removeEventListener('click', this.scaleOut)
				}
				this.pause = false
				this.$refs.video.muted = !value
			},
			pause (value) {
				value ? this.$refs.video.pause() : this.$refs.video.play()
			}
		},
		methods: {
			scaleOut (e) {
				if (!e.target.closest('.videostory')) {
					this.scale = false
					return
				}

				this.pause = !this.pause
			}
		},
		mounted () {
			$(document).scroll((e) => {
				this.shiftRight = $(window).scrollTop() > $(window).height()
			})
		}
	}

</script>

<style>
	


</style>