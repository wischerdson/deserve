<template>
	<div class="brief-form pb-20 pt-28 sm:pt-16 max-w-sm">
		<transition name="form-sent" mode="out-in">
			<div v-if="!form._sent" key="form">
				<v-appearance-animation :animate="animate" effect="from-b-to-t">
					<h2 class="title text-4xl sm:text-3xl font-extralight tracking-rr" appearance-animation-target>Оставьте заявку</h2>
					<p class="desc text-gray-500 leading-normal font-light tracking-wider mt-3" appearance-animation-target>Расскажите о своем проекте и мы с удовольствием включимся в него на любом этапе.</p>
					<form class="mt-6 space-y-1.5" action="/api/fill-form/brief" @submit.prevent="orderCall" novalidate>
						<fieldset appearance-animation-target>
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
						<fieldset appearance-animation-target>
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
						<fieldset appearance-animation-target>
							<v-input
								type="email"
								v-model="form.email"
								label="Ваш email"
								@change="$v.form.email.$touch"
								:success="!$v.form.email.$invalid && $v.form.email.$dirty && form.email.length"
								:errors="{
									'Введите правильный email': $v.form.email.$error && !$v.form.email.email
								}"
							/>
						</fieldset>
						<fieldset appearance-animation-target>
							<v-select
								v-model="form.budget"
								label="Планируемый бюджет"
								:success="form.budget"
							>
								<option class="text-black font-normal" value="" selected></option>
								<option class="text-black font-normal" value="До 500 тыс.">До 500 тыс.</option>
								<option class="text-black font-normal" value="0.5 - 1 млн.">0.5 - 1 млн.</option>
								<option class="text-black font-normal" value="1 - 3 млн.">1 - 3 млн.</option>
								<option class="text-black font-normal" value="От 3 млн.">От 3 млн.</option>
							</v-select>
						</fieldset>
						<fieldset appearance-animation-target>
							<v-textarea
								v-model="form.task_description"
								label="Опишите задачу, которую хотите решить"
								@change="$v.form.task_description.$touch"
								:success="!$v.form.task_description.$invalid && $v.form.task_description.$dirty && form.task_description"
								:errors="{
									'Пожалуйста, опишите задачу подробнее': $v.form.task_description.$error && !$v.form.task_description.minLength
								}"
							/>
						</fieldset>
						<fieldset class="pt-8">
							<v-action-pill
								appearance-animation-target
								type="submit"
								text="Отправить"
								pill-outline
								:loading="form._sending"
							/>
						</fieldset>
					</form>
					<div class="mt-16">
						<p class="text-xs text-gray-600 tracking-wider">Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c <nuxt-link class="hover:underline text-gray-400" to="/legal/privacy-policy" rel="nofollow">политикой конфиденциальности</nuxt-link></p>
					</div>
				</v-appearance-animation>
			</div>

			<!-- Form sent message -->
			<div class="brief-form-sent" v-else key="form-sent">
				<h2 class="thanks-title uppercase text-4xl sm:text-3xl font-extralight tracking-rr">Спасибо</h2>
				<p class="thanks-desc text-gray-400 leading-normal font-light tracking-wider mt-3">Заявка принята. В ближайшее время с Вами свяжется наш менеджер.</p>
				<v-action-pill
					class="thanks-btn mt-8"
					@click="$emit('close')"
					text="Хорошо"
					pill-outline
					:animate-pill="form._sent"
					:animation-delay="500"
				/>
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
		props: {
			animate: Boolean
		},
		data () {
			return {
				form: {
					name: '',
					phone: '',
					email: '',
					budget: '',
					task_description: '',
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
				email: { email },
				task_description: { minLength: minLength(12) }
			}
		},
		methods: {
			orderCall (e) {
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

	.brief-form {
		.form-sent {
			&-leave-active {
				transition: opacity .3s ease;
			}

			&-enter, &-leave-to {
				opacity: 0;
			}

			&-enter-active {
				.thanks-title, .thanks-desc, .thanks-btn {
					transition: opacity .6s ease, transform .6s ease;
				}

				.thanks-desc { transition-delay: .2s; }

				.thanks-btn { transition-delay: .4s; }
			}

			&-enter {
				.thanks-title, .thanks-desc, .thanks-btn  {
					opacity: 0;
					transform: translateY(20px);
				}
			}
		}
	}

</style>
