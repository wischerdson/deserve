<template>
	<div class="videostory fixed bottom-6 left-6 transition-transform duration-500 z-30" :class="{
		'transform translate-x-[-130%]': hidden
	}">
		<div class="wrapper relative rounded-2xl shadow-xl transform transition-transform duration-300 origin-bottom-left" :class="{
			'hover:scale-105': !scale,
			'scale-[2.25]': scale
		}">
			<div class="w-28 relative z-30 pointer-events-none" v-html="require('@/assets/icons/iphone-11.svg?raw')"></div>

			<button class="block absolute inset-0 rounded-2xl overflow-hidden z-10" @click="scale = true">
				<video class="object-center object-cover w-full h-full" :src="require('~/static/video/story-2.mp4')" loop autoplay preload controlslist="nodownload" disablepictureinpicture playsinline preload="auto" muted ref="video"></video>
			</button>

			<button class="close absolute top-0 right-0 py-2 px-3 z-20" v-show="!scale" title="Закрыть" @click="closed = true">
				<span class="block w-2.5 h-2.5 text-white" v-html="require('@/assets/icons/close.svg?raw')"></span>
			</button>
			<button class="rollup absolute top-0 right-0 py-2.5 px-3 z-20" v-show="scale" title="Свернуть" @click.prevent.stop="scale = false">
				<span class="block w-2 h-px rounded-full bg-white"></span>
			</button>
		</div>			
	</div>
</template>

<script>
	
	import $ from 'jquery'

	export default {
		data: () => ({
			scale: false,
			pause: false,
			scrollLimit: false,
			closed: false,
			viewingProgress: 0,
			$video: null
		}),
		computed: {
			hidden () {
				return this.scrollLimit || this.closed
			}
		},
		watch: {
			scale (value) {
				if (value) {
					this.$video.currentTime = this.viewingProgress

					setTimeout(() => {
						document.addEventListener('click', this.scaleOut)
					}, 10)
				} else {
					document.removeEventListener('click', this.scaleOut)
					this.viewingProgress = this.$video.currentTime
				}
				this.pause = false
				this.$video.muted = !value
			},
			pause (value) {
				value ? this.$video.pause() : this.$video.play()
			}
		},
		methods: {
			scaleOut (e) {
				if (!e.target.closest('.videostory')) {
					this.scale = false
					return
				}

				this.pause = !this.pause
			},
			handleScroll () {
				const scroll = window.pageYOffset
				const docHeight = document.documentElement.clientHeight

				this.scrollLimit = scroll >= this.$scrollHeight() - docHeight - 300
			}
		},
		mounted () {
			this.$video = this.$refs.video

			this.handleScroll()
			document.addEventListener('scroll', this.handleScroll)
		}
	}

</script>

<style lang="scss" scoped>
	
	.close {
		opacity: 0;
		transition: opacity .2s ease;
	}
	.wrapper {
		&:hover .close {
			opacity: 1;
		}
	}

</style>