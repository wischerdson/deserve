<template>
	<div class="min-h-screen pt-24">
		<div class="container grid grid-cols-[1fr,auto] gap-8 xl:grid-cols-1 xl:gap-0">
			<!-- Left column -->
			<div class="lg:max-w-sm lg:px-8">
				<!-- Page head -->
				<div class="mt-2">
					<h1 class="text-7xl font-extralight mt-12 tracking-[.5rem] lg:text-4xl lg:tracking-[.25rem]">Связаться с нами</h1>
				</div>

				<div class="grid grid-cols-2 mt-14 lg:grid-cols-1">
					<div class="relative pr-24 lg:pr-0">
						<h2 class="flex items-center space-x-3 text-md tracking-wider">
							<span>Форма обратной связи</span>
							<v-icon name="arrow-right" />
						</h2>
						<p class="text-gray-500 mt-4 leading-normal tracking-wider text-sm">Ваше сообщение будет направлено в отдел по работе с клиентами. Мы обязательно ответим вам в самое ближайшее время.</p>
						<div class="absolute bottom-0 left-0 lg:static lg:mt-6">
							<div class="text-xs text-gray-500 tracking-wider">Присоединяйтесь</div>
							<ul class="flex space-x-3 mt-3">
								<li>
									<a class="text-gray-300" href="https://www.instagram.com/deserve_ru/" target="_blank" title="Наш Instagram" area-label="Наш Instagram">
										<v-icon width="18px" name="instagram" />
									</a>
								</li>
								<li>
									<a class="text-gray-300" href="https://www.facebook.com/deserve.ru" target="_blank">
										<v-icon width="18px" name="facebook" />
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="lg:mt-6">
						<form action="/api/fill-form/feedback" @submit.prevent="sendForm">
							<div class="space-y-4">
								<v-input type="text" name="name" v-model="form.name">
									<template v-slot:label>Имя</template>
								</v-input>
								<v-input type="email" name="email" v-model="form.email">
									<template v-slot:label>Email</template>
								</v-input>
								<v-input type="phone" name="phone" v-model="form.phone">
									<template v-slot:label>Телефон</template>
								</v-input>
								<v-input type="textarea" name="message" v-model="form.message">
									<template v-slot:label>Сообщение</template>
								</v-input>
							</div>
							<button class="btn space-x-4 mt-10" type="submit" ref="submitFormBtn">
								<div class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-400 text-gray-400" ref="submitFormBtnPill">
									<v-icon name="chevron-right" />
								</div>
								<span class="text-xs tracking-rr uppercase text-white font-extralight">Отправить</span>
							</button>
						</form>
					</div>
				</div>
				<div class="grid grid-cols-2 mt-24 lg:grid-cols-1 lg:gap-7">
					<div>
						<h2 class="font-extralight text-3xl text-gray-400 tracking-widest">Где мы находимся?</h2>
						<p class="mt-12 font-normal">Смоленск</p>
						<p class="leading-normal text-gray-300 mt-3">Ленина, 13А, 214000, Этаж 2</p>
					</div>
					<div>
						<div class="pt-3/5 relative">
							<div class="absolute inset-0 rounded-lg" :style="`background-image: url('${require('~/static/image/our-office.jpeg')}`"></div>
						</div>
					</div>
				</div>
			</div>

			<!-- Right column -->
			<div class="pl-3 relative tracking-wider xl:pl-0 lg:max-w-sm lg:px-8">
				<div class="absolute h-full min-h-screen w-0.5 bg-gray-800 left-0 -top-1.5 xl:hidden"></div>
				<div class="sticky top-28 mt-14 space-y-14 xl:static xl:grid xl:grid-cols-3 xl:space-y-0 xl:gap-8 lg:grid-cols-2">
					<div>
						<h2 class="mb-2.5 font-normal relative">
							<span>Контакты</span>
							<span class="absolute inset-y-0 -left-3 bg-white w-0.5 xl:hidden"></span>
						</h2>
						<div class="text-gray-500">
							<a class="hover:underline" href="mailto:info@deserve.ru">info@deserve.ru</a>
						</div>
						<div class="text-gray-500 mt-1.5 lg:text-sm">
							<a class="hover:underline" href="tel:+79958808484">8 (995) 880 84-84</a>
						</div>
					</div>
					<div>
						<h2 class="mb-2.5 font-normal relative">
							<span>Часы работы</span>
							<span class="absolute inset-y-0 -left-3 bg-white w-0.5 xl:hidden"></span>
						</h2>
						<p class="text-gray-500 leading-normal lg:text-sm">Без выходных <br>09:00 - 19:00</p>
					</div>
					<div class="pr-44 xl:pr-0">
						<h2 class="mb-4 font-normal relative">
							<span>Мы в мессенджерах</span>
							<span class="absolute inset-y-0 -left-3 bg-white w-0.5 xl:hidden"></span>
						</h2>
						<ul class="flex space-x-5">
							<li>
								<a class="tg-link btn w-10 h-10 rounded-full bg-telegram" href="https://t.me/deserve_ru" target="_blank" title="Связаться с нами через Telegram">
									<v-icon width="20px" name="telegram" />
								</a>
							</li>
							<li>
								<a class="wa-link btn w-10 h-10 rounded-full bg-whatsapp" href="https://wa.me/message/Y6UYTJZNKUUMA1" target="_blank" title="Связаться с нами по WhatsApp">
									<v-icon width="20px" name="whatsapp" />
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		data () {
			return {
				form: {
					name: '', phone: '',
					email: '', message: ''
				}
			}
		},
		methods: {
			sendForm (e) {
				const url = e.target.getAttribute('action')
				this.$axios.$post(url, this.form).then((d) => {
					console.log(d)
				})
			}
		},
		mounted () {
			this.magneticSubmitFormBtn = this.$magnetic.add({
				element: this.$refs.submitFormBtn,
				trigger: this.$refs.submitFormBtnPill,
				updateOnScroll: true
			})
		}
	}

</script>

<style lang="scss" scoped>

	.tg-link {
		box-shadow: 0 0 20px 0 theme('colors.telegram');
	}
	.wa-link {
		box-shadow: 0 0 20px 0 theme('colors.whatsapp');
	}

</style>
