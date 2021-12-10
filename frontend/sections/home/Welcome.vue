<template>
	<section class="min-h-screen lg:min-h-0 flex items-center relative">
		<!-- Background -->
		<div class="absolute inset-0">
			<video
				class="w-full h-full object-cover object-center"
				:src="require('~/static/video/welcome-background.mp4')"
				autoplay="autoplay"
				preload="auto"
				loop="loop"
				muted="muted"
				disablePictureInPicture
				playsinline
			></video>
			<div class="absolute inset-0 bg-black/40"></div>
		</div>
		<div class="absolute inset-0 z-10 flex items-center">
			<div class="container">
				<p class="text-white text-center mb-10 text-xl uppercase tracking-widest">Ваш партнер в digital-среде</p>
				<h1 class="text-white text-center font-light text-6xl uppercase tracking-widest">Design. Strategy. Garmony.</h1>
			</div>
		</div>
		<div class="absolute inset-x-0 bottom-0 flex justify-center">
			<div class="w-0.5 bg-white/20 h-20 overflow-hidden">
				<div class="anim-scroll-down w-full h-full bg-white"></div>
			</div>
		</div>
	</section>
</template>

<style lang="scss" scoped>

	.anim-scroll-down {
		transform-origin: 0 0;
		animation: section_welcome__scroll_down 2.2s ease-in-out infinite;
	}

	@keyframes section_welcome__scroll_down {
		0% {
			transform: scaleY(.80) translateY(-85px);
		}
		85% {
			transform-origin: 0 100%;
			transform: scaleY(.70) translateY(80px);
		}
		100% {
			transform-origin: 0 100%;
			transform: scaleY(.70) translateY(80px);
		}
	}

</style>
