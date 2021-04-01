<template>
	<div id="section_parallax">
		<div class="container">
			<div class="banner">
				<div class="bg-parallax" ref="bgWrapper">
					<img class="bg" src="@/assets/img/welcome-bg.png" alt="" ref="bg">
				</div>
				<div class="bg-overlay">
					<img class="decoration" src="@/assets/img/decorative-rain.svg" alt="">
				</div>
				<div class="text">
					<h2><span class="blue-highlight">Что говорят клиенты</span> <br>о нашей работе</h2>
					<button class="banner-action see-video-feedback">
						<div class="play-btn">
							<svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path></svg>
						</div>
						<div class="label">
							<div class="name">Посмотреть видео-отзывы</div>
						</div>
					</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		mounted () {
			this.$jarallax(this.$refs.bgWrapper, {
				speed: 0.65,
				imgElement: this.$refs.bg
			})
		}
	}

</script>