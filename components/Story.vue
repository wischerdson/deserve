<template>
	<div class="videostory fixed bottom-6 left-6 transition-transform duration-500 z-30" :class="{
		'transform translate-x-[calc(-100%-50px)]': hidden
	}">
		<div class=" rounded-2xl" :class="{
			'anim-pulse': pulse
		}">
			<div class="wrapper border-2 border-black ring ring-primary ring-opacity-50 shadow-xl transform transition-all duration-300 origin-bottom-left relative rounded-2xl overflow-hidden" :class="{
				'hover:scale-105': !scale,
				'rounded-3xl': scale
			}" @mouseover="pulse = false">
				<button class="block z-10 transition-all duration-300" :class="{
					'w-64 h-[512px]': scale,
					'w-20 h-40 md:w-28 md:h-56': !scale
				}" @click="scale = true">
					<video class="object-center object-cover w-full h-full" :src="require('~/static/video/story-2.mp4')" loop autoplay preload controlslist="nodownload" disablepictureinpicture playsinline preload="auto" muted ref="video"></video>
				</button>

				<button class="close absolute top-0 right-0 py-2 px-2 z-20" v-show="!scale" title="Закрыть" @click="closed = true">
					<span class="block w-2.5 h-2.5 text-white" v-html="require('@/assets/icons/close.svg?raw')"></span>
				</button>
				<button class="rollup absolute top-0 right-0 py-4 px-4 z-20" v-show="scale" title="Свернуть" @click.prevent.stop="scale = false">
					<span class="block w-4 h-0.5 rounded-full bg-white"></span>
				</button>
			</div>	
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
			$video: null,
			pulse: true
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
		@media (min-width: 768px) {
			opacity: 0;
			transition: opacity .2s ease;
		}
	}
	.wrapper {
		&:hover .close {
			opacity: 1;
		}
	}
	.anim-pulse {
		animation: pulse 2s ease-out infinite;
	}
	@keyframes pulse {
		0% {
			box-shadow: 0 0 0 0 rgba(#ea110c, 70%);
		}
		40% {
			box-shadow: 0 0 0px 20px rgba(#ea110c, 0);
		}
	}

</style>