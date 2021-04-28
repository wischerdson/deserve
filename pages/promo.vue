<template>
	<div id="template_promo">
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
						<a href="https://blcsand.com" target="_blank" class="to-site btn btn-red btn-line">
							<span>Перейти на сайт</span>
						</a>
					</div>
				</div>
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
				<div class="success-popup" v-if="successModal">
					<div class="backdrop" @click="successModal = false"></div>
					<div class="popup-body">
						<div class="icon" v-html="require('@/assets/icons/check-solid.svg?raw')"></div>
						<div class="popup-title">Успешно</div>
						<p>Мы получили Вашу заявку и ответим <br>в ближайшее время</p>
						<button class="btn btn-green" @click="successModal = false">Ok</button>
					</div>
				</div>
			</section>
			<section class="section_ourPrinciples">
				<div class="dotted-pattern"></div>
				<div class="container section-body">
					<div>
						<div class="comic-text">Our principles</div>
						<h3 class="section-title">3 причины заказать разработку сайта именно у <span class="red-highlight">нас</span></h3>
					</div>
					<div>
						<ul class="list">
							<li>
								<div class="num">01</div>
								<div>
									<div class="item-title">Фиксированные цены</div>
									<p class="item-desc">Все условия прописываются в договоре. Никаких дополнительных платежей и подводных камней. Вы сразу получаете полный доступ к вашему проекту.</p>
								</div>
							</li>
							<li>
								<div class="num">02</div>
								<div>
									<div class="item-title">Никаких шаблонов</div>
									<p class="item-desc">Мы не используем готовые дизайны сайтов - все элементы страницы будут уникальными и сделанные с нуля</p>
								</div>
							</li>
							<li>
								<div class="num">03</div>
								<div>
									<div class="item-title">Реклама в подарок</div>
									<p class="item-desc">Если цель создания сайта - поиск новых клиентов для вашей компании, настройку рекламы мы предоставим в подарок</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</section>
			<section class="parallax-section">
				<Parallax />
			</section>
		</main>
	</div>
</template>

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
				slider: null,
				successModal: false
			}
		},
		methods: {
			sendForm (e) {
				const form = e.target
				const url = form.attributes.action.value
				const formData = new FormData(form)

				this.$axios.post(url, formData).then(({data}) => {
					this.successModal = true
				}).catch((e) => {
					alert('Error occured')
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
				dots: true,
				appendDots: $(this.$refs.navigationDots),
			})

			this.slider.on('beforeChange', (event, slick, currentSlide) => {
				$('#section_portfolio .swipe-to-slide').addClass('hidden')
			})

			this.slider.on('afterChange', (event, slick, currentSlide) => {
				const link = $(`#section_portfolio [data-slick-index="${currentSlide}"] .see-project`).attr('href')
				$('#section_portfolio .to-site').attr('href', link)
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