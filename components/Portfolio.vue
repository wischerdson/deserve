<template>
	<div id="section_portfolio">
		<div class="slider">
			<div class="navigation">
				<button ref="prevBtn" class="btn prev" v-html="require('@/assets/icons/chevron-left.svg?raw')"></button>
				<button ref="nextBtn" class="btn next" v-html="require('@/assets/icons/chevron-right.svg?raw')"></button>
			</div>
			
			<ul class="slides" ref="slides">
				<li class="slide" v-for="project in projects">
					<div class="slide-content container">
						<div class="project-preview">
							<button class="next-slide-btn" @click="slider.slick('slickNext')"></button>
							<img class="project-image" :src="require(`@/static/img/projects/${project.image}`)" alt="">
							<div class="overlay-on-hover">
								<a :href="project.link" class="see-project" target="_blank">
									<span>Перейти на сайт</span>
									<span class="icon" v-html="require('@/assets/icons/external-link.svg?raw')"></span>
								</a>
							</div>
						</div>
					</div>
				</li>
			</ul>

			<div class="swipe-to-slide">
				<img src="@/static/img/swipe-to-slide.svg" alt="">
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
		data () {
			return {
				projects: [
					{ image: 'tg_image_4030849595.jpeg', link: 'https://blcsand.com' },
					{ image: 'tg_image_570309526.jpeg', link: 'https://zefir.design' },
					{ image: 'tg_image_1243195822.jpeg', link: 'https://tekhnokultura.com' },
					{ image: 'tg_image_1295081776.jpeg', link: 'https://bestpayments.solutions' },
					{ image: 'tg_image_1994154273.jpeg', link: 'https://buhanka.ru' },
					{ image: 'tg_image_3913596754.jpeg', link: 'https://moskovsky65.legenda-dom.ru' },
					{ image: 'tg_image_3460088364.jpeg', link: 'https://pride.marketing' },
					{ image: 'tg_image_2600237303.jpeg', link: 'https://adelinalazarova.com' },
				],
				slider: null
			}
		},
		mounted () {
			this.slider = $(this.$refs.slides).slick({
				infinite: true,
				autoplay: false,
				autoplaySpeed: 5000,
				fade: true,
				useTransform: false,
				waitForAnimate: false,
				speed: 700,
				prevArrow: $(this.$refs.prevBtn),
				nextArrow: $(this.$refs.nextBtn),
				dots: true,
				appendDots: $(this.$refs.navigationDots),
			})

			this.slider.on('afterChange', (event, slick, currentSlide) => {
				const link = $(`#section_portfolio [data-slick-index="${currentSlide}"] .see-project`).attr('href')
				$('#section_portfolio .to-site').attr('href', link)
			})

			this.slider.on('beforeChange', (event, slick, currentSlide) => {
				$('#section_portfolio .swipe-to-slide').addClass('hidden')
			})
		}
	}

</script>