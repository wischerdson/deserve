<template>
	<div>
		<main>
			<section id="section_projects" style="margin-top: 80px">
				<div class="section-header container">
					<h2 class="section-title">Оставить <span class="red-highlight">заявку</span></h2>
					<h1 style="margin-top: 50px; margin-bottom: -60px; font-weight: 500; font-size: 1.3rem;">Последние наши работы</h1>
				</div>
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
					</div>
					<div class="container slider-bottom" style="margin-right: auto; margin-top: -20px;">
						<div class="dots" ref="navigationDots"></div>
					</div>
				</div>
				<!-- <script></script><script id="amoforms_script_773008" async="async" charset="utf-8" src="https://forms.amocrm.ru/forms/assets/js/amoforms.js?1619386601"></script> -->
				<!-- <div ref="amoscript"></div> -->
				
			</section>
			<section class="section_feedback">
				<div class="section-body container">
					<div class="black-block">
						<img class="decorative" src="@/static/img/decorative-hedgehog.svg" alt="">
						<h2>Расcчитайте стоимость сайта с <span class="text-red">экономией</span> <br>до <span class="text-red">25 000</span> рублей</h2>
						<form @submit.prevent="sendForm" action="https://formsubmit.co/wischerdson@gmail.com" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input class="form-control1" type="text" name="name" placeholder="Ваше имя">
							</div>
							<div class="form-group">
								<input class="form-control1" type="phone" name="phone" placeholder="Телефон">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-red">Отправить</button>
							</div>
						</form>
					</div>
					<div class="or">
						<div class="title">Или напишите нам в WhatsApp, Telegram или Viber</div>
						<div class="row">
							<a class="btn green" href="">WhatsApp</a>
							<a class="btn blue" href="">Telegram</a>
							<a class="btn purple" href="">Viber</a>
						</div>
					</div>
				</div>
			</section>
			<section class="parallax-section">
				<Parallax />
			</section>
		</main>
	</div>
</template>

<style lang="scss" scoped>
	.section_feedback {
		margin: 100px 0;

		.black-block {
			background-color: #19191c;
			padding: 70px 100px;
			padding-right: 150px;
			position: relative;
			overflow: hidden;
			position: relative;
			box-shadow: 0 40px 0 -20px #ea110c;
		}
		.or {
			margin-top: 70px;

			.title {
				font-size: 1.6rem;
				font-weight: 500;
			}
			.row {
				max-width: 700px;
				margin-top: 40px;
				display: grid;
				grid-template-columns: repeat(3, 1fr);
				grid-gap: 40px;
			}
			.btn {
				width: 100%;
				display: flex;
				align-items: center;
				justify-content: center;
				color: #fff;
				font-size: 1.2rem;
				font-weight: 500;
				height: 65px;
				// padding: 0 40px;

				&.green {
					background-color: #00db74;
					animation: pulse-green 1.9s ease infinite 1s;

					@keyframes pulse-green {
						0% {
							box-shadow: 0 0 0 0 #00db74;
						}
						30% {
							box-shadow: 0 0 0 14px rgba(#00db74, 0);
						}
					}
				}
				&.blue {
					background-color: #00a7e7;
					animation: pulse-blue 2s ease infinite;

					@keyframes pulse-blue {
						0% {
							box-shadow: 0 0 0 0 #00a7e7;
						}
						30% {
							box-shadow: 0 0 0 14px rgba(#00a7e7, 0);
						}
					}
				}
				&.purple {
					background-color: #6a5bb0;
					animation: pulse-purple 2.1s ease infinite 1s;

					@keyframes pulse-purple {
						0% {
							box-shadow: 0 0 0 0 #6a5bb0;
						}
						30% {
							box-shadow: 0 0 0 14px rgba(#6a5bb0, 0);
						}
					}
				}
			}
		}
		.decorative {
			width: 270px;
			position: absolute;
			bottom: -76px;
			right: -30px;
			filter: invert(100%);
			z-index: 1;
		}
		.text-red {
			color: #ea110c;
		}
		h2 {
			font-weight: 600;
			font-size: 2.8rem;
			color: #fff;

			@media (max-width: 670px) {
				font-size: 2rem;
			}
		}
		form {
			display: grid;
			grid-template-columns: 1fr 1fr auto;
			grid-gap: 30px;
			max-width: 800px;
			margin-top: 80px;

			.btn {
				padding: 18px 40px;
				font-size: 1.2rem;
				position: relative;
				z-index: 2;
				animation: pulse 2s ease infinite 1s;

				// &:before {
				// 	z-index: 0;
				// 	content: "";
				// 	position: absolute;
				// 	top: -7px;
				// 	left: -7px;
				// 	right: -7px;
				// 	bottom: -7px;
				// 	background-color: rgba(#ea110c, 30%);
				// 	border-radius: 7px;
					
				// }
				@keyframes pulse {
					0% {
						box-shadow: 0 0 0 0 #ea110c;
					}
					30% {
						box-shadow: 0 0 0 14px rgba(#ea110c, 0);
					}
				}
			}
			@media (max-width: 670px) {
				grid-template-columns: 1fr;
			}
		}
		.form-control1 {
			border: none;
			outline: none;
			display: block;
			width: 100%;
			border: none;
			padding: 14px 25px;
			line-height: 1.6;
			color: #000;
			transition: border .2s ease;
			background-color: #fff;
			font-size: 1.2rem;
		}
	}

</style>

<script>
	
	import Parallax from '@/components/Parallax'
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
		methods: {
			sendForm (e) {
				const form = e.target
				const url = form.attributes.action.value
				const formData = new FormData(form)
				


				// const iframe = this.$refs.iframe.contentDocument



				// iframe.body.append(form)

				this.$axios.post(url, formData).then(({data}) => {
					alert('Успешно')
				}).catch((e) => {
					alert('Не успешно')
				})
			}
		},
		components: {
			Parallax
		},
		mounted () {
			

			this.slider = $(this.$refs.slides).slick({
				infinite: true,
				autoplay: true,
				autoplaySpeed: 3000,
				fade: true,
				useTransform: true,
				waitForAnimate: false,
				speed: 700,
				prevArrow: $(this.$refs.prevBtn),
				nextArrow: $(this.$refs.nextBtn),
				dots: false,
				appendDots: $(this.$refs.navigationDots),
			})

			this.slider.on('beforeChange', (event, slick, currentSlide) => {
				$('#section_portfolio .swipe-to-slide').addClass('hidden')
			})

			// const script1 = document.createElement('script')
			// script1.innerHTML = '!function(a,mm,o,c,r,m){a[o+c]=a[o+c]||{setMeta:function(p){this.params=(this.params||[]).concat([p])}},a[o+r]=a[o+r]||function(f){a[o+r].f=(a[o+r].f||[]).concat([f])},a[o+r]({id:"773008",hash:"e510bc467eacc6e099bdd0d4fded3612",locale:"ru"})}(window,0,"amo_forms_","params","load");'
			// const script2 = document.createElement('script')
			// script2.setAttribute('id', 'amoforms_script_773008')
			// script2.setAttribute('src', 'https://forms.amocrm.ru/forms/assets/js/amoforms.js?1619386601')
			// this.$refs.amoscript.prepend(script1)
			// this.$refs.amoscript.prepend(script2)

		},
		head () {
			return {
				title: this.$t('pages.portfolio.title'),
				meta: [
					{ property: 'og:title', content: this.$t('pages.portfolio.title'), hid: 'og-title' },
				],
				script: [
					
				]
			}
		}
	}

</script>