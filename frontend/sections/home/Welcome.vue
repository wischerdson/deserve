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
		</div>
	</section>
</template>
