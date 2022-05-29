<template>
	<div class="lg:mt-6 pr-10 lg:pr-0">
		<transition name="form-contact-us" mode="out-in">
			<div v-if="!form._sent">
				<v-appearance-animation effect="from-b-to-t">
					<form class="space-y-1.5" action="/fill-form/feedback" @submit.prevent="sendForm">
						<fieldset appearance-animation-target>
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
						<fieldset appearance-animation-target>
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
						<fieldset appearance-animation-target>
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
						<fieldset appearance-animation-target>
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
						<div>
							<v-action-pill
								class="mt-4"
								appearance-animation-target
								type="submit"
								pill-outline
								text="Отправить"
								:loading="form._sending"
							/>
						</div>
					</form>
					<p class="text-xs text-gray-600 tracking-wider mt-12">
						Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c
						<nuxt-link class="hover:underline text-gray-400" to="/legal/privacy-policy" rel="nofollow">политикой конфиденциальности</nuxt-link>
					</p>
				</v-appearance-animation>
			</div>

			<!-- Form sent message -->
			<div class="callback-form-sent max-w-sm" v-else key="form-sent">
				<v-appearance-animation :animate="animate" effect="from-t-to-b">
					<h2 class="uppercase text-4xl sm:text-3xl font-extralight tracking-rr" appearance-animation-target>Спасибо</h2>
					<p class="text-gray-400 leading-normal font-light tracking-wider mt-3" appearance-animation-target>Заявка принята. В ближайшее время с Вами свяжется наш менеджер.</p>
				</v-appearance-animation>
			</div>
		</transition>
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
					message: '',
					_sent: false,
					_error: false,
					_sending: false
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
			},
			focusFirstInput () {
				this.$refs.firstInput.$el.querySelector('.ui-base-input__input').focus()
			}
		}
	}

</script>

<style lang="scss" scoped>

	.form-contact-us {
		&-leave-active {
			transition: opacity .3s ease;
		}

		&-enter, &-leave-to {
			opacity: 0;
		}
	}

</style>
