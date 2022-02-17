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
						<h2 class="text-md tracking-wider">
							<button class="btn" @click="focusFirstInput">
								<span>Форма обратной связи</span>
								<v-icon name="arrow-right" />
							</button>
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
						<form class="space-y-1.5" action="/api/fill-form/feedback" @submit.prevent="sendForm">
							<fieldset>
								<v-input
									ref="firstInput"
									type="text"
									v-model="form.name"
									label="Имя"
									@change="$v.form.name.$touch"
									:success="!$v.form.name.$invalid && $v.form.name.$dirty"
									:errors="{
										'Пожалуйста, заполните это поле': this.$v.form.name.$error && !this.$v.form.name.required,
										'Введите Ваше имя': this.$v.form.name.$error && !this.$v.form.name.minLength
									}"
								/>
							</fieldset>
							<fieldset>
								<v-input
									type="email"
									v-model="form.email"
									label="Email"
									@change="$v.form.email.$touch"
									:success="!$v.form.email.$invalid && $v.form.email.$dirty"
									:errors="{
										'Пожалуйста, заполните это поле': $v.form.email.$error && !$v.form.email.required,
										'Введите правильный email': $v.form.email.$error && !$v.form.email.email
									}"
								/>
							</fieldset>
							<fieldset>
								<v-input-phone
									v-model="form.phone"
									label="Телефон"
									@change="$v.form.phone.$touch"
									:success="!$v.form.phone.$invalid && $v.form.phone.$dirty"
									:errors="{
										'Пожалуйста, заполните это поле': $v.form.phone.$error && !$v.form.phone.required,
										'Введите правильный номер': $v.form.phone.$error && !$v.form.phone.phone
									}"
								/>
							</fieldset>
							<fieldset>
								<v-textarea
									v-model="form.message"
									label="Сообщение"
									@change="$v.form.message.$touch"
									:success="!$v.form.message.$invalid && $v.form.message.$dirty"
									:errors="{
										'Пожалуйста, заполните это поле': $v.form.message.$error && !$v.form.message.required
									}"
								/>
							</fieldset>
							<button class="btn space-x-4 mt-10" type="submit" ref="submitFormBtn">
								<div class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-400 text-gray-400" ref="submitFormBtnPill">
									<v-icon name="chevron-right" />
								</div>
								<span class="text-xs tracking-rr uppercase text-white font-extralight">Отправить</span>
							</button>
						</form>
						<p class="text-xs text-gray-600 tracking-wider mt-12">
							Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c
							<nuxt-link class="hover:underline text-gray-400" to="/legal/privacy-policy">политикой конфиденциальности</nuxt-link>
						</p>
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

	import { validationMixin } from 'vuelidate'
	import { required, minLength, email } from 'vuelidate/lib/validators'
	import { phone } from '~/plugins/custom-validators'

	export default {
		mixins: [ validationMixin ],
		data () {
			return {
				form: {
					name: '',
					phone: '',
					email: '',
					message: ''
				}
			}
		},
		validations: {
			form: {
				name: { required, minLength: minLength(2) },
				phone: { required, phone },
				email: { required, email },
				message: { required }
			}
		},
		methods: {
			sendForm (e) {
				const url = e.target.getAttribute('action')
				this.$axios.$post(url, this.form).then((d) => {
					console.log(d)
				})
			},
			focusFirstInput () {
				this.$refs.firstInput.$el.querySelector('.ui-base-input__input').focus()
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
