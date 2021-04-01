<template>
	<div id="section_portfolio">
		<div class="slider">
			<div class="navigation">
				<button ref="prevBtn" class="btn prev" v-html="require('@/assets/icons/chevron-left.svg?raw')"></button>
				<button ref="nextBtn" class="btn next" v-html="require('@/assets/icons/chevron-right.svg?raw')"></button>
			</div>
			
			<ul class="slides" ref="slides">
				<li class="slide">
					<div class="slide-content container">
						<div class="project-preview">
							<img class="project-image" src="@/assets/img/projects/tg_image_4030849595.jpeg" alt="">
							<div class="overlay-on-hover">
								<a href="https://blcsand.com" class="see-project" target="_blank">
									<span>Перейти на сайт</span>
									<span class="icon" v-html="require('@/assets/icons/external-link.svg?raw')"></span>
								</a>
							</div>
						</div>
					</div>
				</li>
				<li class="slide">
					<div class="slide-content container">
						<div class="project-preview">
							<img class="project-image" src="@/assets/img/projects/tg_image_570309526.jpeg" alt="">
							<div class="overlay-on-hover">
								<a href="https://zefir.design" class="see-project" target="_blank">
									<span>Перейти на сайт</span>
									<span class="icon" v-html="require('@/assets/icons/external-link.svg?raw')"></span>
								</a>
							</div>
						</div>
					</div>
				</li>
				<li class="slide">
					<div class="slide-content container">
						<div class="project-preview">
							<img class="project-image" src="@/assets/img/projects/tg_image_1243195822.jpeg" alt="">
							<div class="overlay-on-hover">
								<a href="https://tekhnokultura.com" class="see-project" target="_blank">
									<span>Перейти на сайт</span>
									<span class="icon" v-html="require('@/assets/icons/external-link.svg?raw')"></span>
								</a>
							</div>
						</div>
					</div>
				</li>
				<li class="slide">
					<div class="slide-content container">
						<div class="project-preview">
							<img class="project-image" src="@/assets/img/projects/tg_image_1295081776.jpeg" alt="">
							<div class="overlay-on-hover">
								<a href="https://bestpayments.solutions" class="see-project" target="_blank">
									<span>Перейти на сайт</span>
									<span class="icon" v-html="require('@/assets/icons/external-link.svg?raw')"></span>
								</a>
							</div>
						</div>
					</div>
				</li>
				<li class="slide">
					<div class="slide-content container">
						<div class="project-preview">
							<img class="project-image" src="@/assets/img/projects/tg_image_1994154273.jpeg" alt="">
							<div class="overlay-on-hover">
								<a href="https://buhanka.ru" class="see-project" target="_blank">
									<span>Перейти на сайт</span>
									<span class="icon" v-html="require('@/assets/icons/external-link.svg?raw')"></span>
								</a>
							</div>
						</div>
					</div>
				</li>
				<li class="slide">
					<div class="slide-content container">
						<div class="project-preview">
							<img class="project-image" src="@/assets/img/projects/tg_image_3913596754.jpeg" alt="">
							<div class="overlay-on-hover">
								<a href="https://moskovsky65.legenda-dom.ru" class="see-project" target="_blank">
									<span>Перейти на сайт</span>
									<span class="icon" v-html="require('@/assets/icons/external-link.svg?raw')"></span>
								</a>
							</div>
						</div>
					</div>
				</li>
				<li class="slide">
					<div class="slide-content container">
						<div class="project-preview">
							<img class="project-image" src="@/assets/img/projects/tg_image_3460088364.jpeg" alt="">
							<div class="overlay-on-hover">
								<a href="https://pride.marketing" class="see-project" target="_blank">
									<span>Перейти на сайт</span>
									<span class="icon" v-html="require('@/assets/icons/external-link.svg?raw')"></span>
								</a>
							</div>
						</div>
					</div>
				</li>
				<li class="slide">
					<div class="slide-content container">
						<div class="project-preview">
							<img class="project-image" src="@/assets/img/projects/tg_image_2600237303.jpeg" alt="">
							<div class="overlay-on-hover">
								<a href="https://adelinalazarova.com" class="see-project" target="_blank">
									<span>Перейти на сайт</span>
									<span class="icon" v-html="require('@/assets/icons/external-link.svg?raw')"></span>
								</a>
							</div>
						</div>
					</div>
				</li>
			</ul>

			<div class="swipe-to-slide">
				<img src="@/assets/img/swipe-to-slide.gif" alt="">
				<span>Смахните чтобы посмотреть <br>другие кейсы</span>
			</div>
		</div>
		<div class="container slider-bottom">
			<div class="dots" ref="navigationDots"></div>
			<a href="https://blcsand.com" target="_blank" class="to-site btn btn-red btn-line">
				<span>Перейти на сайт</span>
			</a>
		</div>
	</div>
</template>

<script>

	import $ from 'jquery'

	export default {
		mounted () {
			const slider = $(this.$refs.slides).slick({
				infinite: true,
				autoplay: false,
				autoplaySpeed: 5000,
				fade: true,
				useTransform: false,
				speed: 700,
				prevArrow: $(this.$refs.prevBtn),
				nextArrow: $(this.$refs.nextBtn),
				dots: true,
				appendDots: $(this.$refs.navigationDots),
			})

			slider.on('afterChange', (event, slick, currentSlide) => {
				const link = $(`#section_portfolio [data-slick-index="${currentSlide}"] .see-project`).attr('href')
				$('#section_portfolio .to-site').attr('href', link)
			})

			slider.on('beforeChange', (event, slick, currentSlide) => {
				$('#section_portfolio .swipe-to-slide').addClass('hidden')
			})
		}
	}

</script>