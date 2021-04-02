<template>
	<div id="section_parallax">
		<div class="container">
			<div class="banner">
				<div class="bg-parallax" ref="bgWrapper">
					<!-- <img class="bg" src="@/static/img/welcome-bg.png" alt="" ref="bg"> -->
				</div>
				<div class="bg-overlay">
					<img class="decoration" src="@/static/img/decorative-rain.svg" alt="">
				</div>
				<div class="text">
					<h2><span class="blue-highlight">Свяжитесь с нами</span> <br>чтобы узнать, как мы <br>можем помочь вам <br>с вашим проектом.</h2>
					<nuxt-link class="btn btn-line btn-red" :to="localePath('feedback')">Оставить заявку</nuxt-link>
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
				videoSrc: 'https://www.youtube.com/watch?v=lu72YfaDU1o'
				//imgElement: this.$refs.bg
			})
		}
	}

</script>