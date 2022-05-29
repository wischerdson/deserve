<template>
	<transition name="vacancy-form-modal">
		<div class="vacancy-form-modal fixed top-0 inset-x-0 h-screen bg-black z-30">
			<div class="container relative h-full flex items-center justify-center">
				<div class="absolute top-0 right-4">
					<v-action class="py-6 uppercase text-xs tracking-[.25rem] mt-1 font-normal text-gray-400 hover:text-white transition-colors" left-icon="close" @click="$emit('close')">Закрыть</v-action>
				</div>

				<transition name="form-sent" mode="out-in">
					<div class="max-w-sm" v-if="!form._sent">
						<h2 class="title text-4xl font-extralight tracking-[.25rem]">Обратный звонок</h2>
						<p class="desc mt-6 text-gray-400 tracking-widest text-sm font-extralight leading-normal">Заполните форму ниже и мы обязательно свяжемся с вами в ближайшее время.</p>

						<form class="mt-6 space-y-1.5" action="/fill-form/vacancy" @submit.prevent="sendForm">
							<fieldset>
								<v-input
									type="text"
									v-model="form.vacancy"
									label="Вакансия"
									:success="true"
									disabled
								/>
							</fieldset>
							<fieldset>
								<v-input
									type="text"
									v-model="form.name"
									label="Как к Вам обращаться?"
									@change="$v.form.name.$touch"
									:success="!$v.form.name.$invalid && $v.form.name.$dirty"
									:errors="{
										'Пожалуйста, заполните это поле': $v.form.name.$error && !$v.form.name.required,
										'Введите Ваше имя': $v.form.name.$error && !$v.form.name.minLength,
									}"
								/>
							</fieldset>
							<fieldset>
								<v-input-phone
									v-model="form.phone"
									label="Ваш номер телефона"
									@change="$v.form.phone.$touch"
									:success="!$v.form.phone.$invalid && $v.form.phone.$dirty"
									:errors="{
										'Пожалуйста, заполните это поле': $v.form.phone.$error && !$v.form.phone.required,
										'Введите правильный номер': $v.form.phone.$error && !$v.form.phone.phone,
									}"
								/>
							</fieldset>
							<div class="pt-8">
								<v-action-pill
									class="submit-btn"
									type="submit"
									text="Отправить"
									pill-outline
									:loading="form._sending"
								/>
							</div>
						</form>
						<div class="mt-16">
							<p class="text-xs text-gray-600 tracking-wider">
								Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c
								<nuxt-link class="hover:underline text-gray-400" to="/legal/privacy-policy" rel="nofollow">политикой конфиденциальности</nuxt-link>
							</p>
						</div>
					</div>

					<!-- Form sent message -->
					<div class="max-w-sm" v-else key="form-sent">
						<v-appearance-animation effect="from-b-to-t">
							<h2 class="uppercase text-4xl sm:text-3xl font-extralight tracking-rr" appearance-animation-target>Спасибо</h2>
							<p class="text-gray-400 leading-normal font-light tracking-wider mt-3" appearance-animation-target>Заявка принята. В ближайшее время с Вами свяжется наш менеджер.</p>
							<v-action-pill
								appearance-animation-target
								class="mt-8"
								@click="$emit('close')"
								text="Хорошо"
								pill-outline
								:animate-pill="form._sent"
								:animation-delay="500"
							/>
						</v-appearance-animation>
					</div>
				</transition>
			</div>
		</div>
	</transition>
</template>

<script>

	import { validationMixin } from 'vuelidate'
	import { required, minLength } from 'vuelidate/lib/validators'
	import { phone } from '~/plugins/custom-validators'

	export default {
		mixins: [ validationMixin ],
		props: {
			vacancy: { type: String, required: false, default: '' }
		},
		data () {
			return {
				form: {
					vacancy: this.vacancy,
					name: '',
					phone: '',
					_sent: false,
					_error: false,
					_sending: false
				}
			}
		},
		watch: {
			vacancy (value) {
				this.form.vacancy = value
			}
		},
		validations: {
			form: {
				name: { required, minLength: minLength(2) },
				phone: { required, phone }
			}
		},
		methods: {
			sendForm (e) {
				this.$v.$touch()
				if (this.$v.$error) return

				this.form._sending = true

				const url = e.target.getAttribute('action')

				this.$axios.$post(url, this.form).then(() => {
					this.form._sent = true
				}).catch(() => {
					this.form._error = true
				}).finally(() => {
					this.form._sending = false
				})
			}
		}
	}

</script>

<style lang="scss">

	.vacancy-form-modal {
		&-enter-active, &-leave-active {
			transition: opacity .2s ease;
		}

		&-enter, &-leave-to {
			opacity: 0;
		}
	}

</style>
