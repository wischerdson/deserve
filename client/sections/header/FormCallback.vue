<template>
	<transition name="callback-form" :duration="2000" mode="out-in">
		<div v-if="!form._sent" key="form">
			<v-appearance-animation :animate="animate" effect="from-t-to-b">
				<h2 class="text-4xl font-extralight tracking-[.25rem]" appearance-animation-target>Обратный звонок</h2>
				<p class="mt-6 text-gray-400 tracking-widest text-sm font-extralight leading-normal" appearance-animation-target>Заполните форму ниже и мы обязательно свяжемся <br> с вами в ближайшее время.</p>

				<form class="mt-6 space-y-1.5" action="/api/fill-form/ordering-callback" @submit.prevent="orderCall">
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
					<div class="pt-8">
						<v-action-pill
							appearance-animation-target
							class="submit-btn"
							type="submit"
							text="Отправить"
							pill-outline
							:loading="form._sending"
						/>
					</div>
				</form>
			</v-appearance-animation>
		</div>

		<!-- Form sent message -->
		<div class="callback-form-sent max-w-sm" v-else key="form-sent">
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
</template>

<script>

	import { validationMixin } from 'vuelidate'
	import { required, minLength } from 'vuelidate/lib/validators'
	import { phone } from '~/plugins/custom-validators'

	export default {
		mixins: [ validationMixin ],
		props: {
			animate: { type: Boolean, default: false }
		},
		data () {
			return {
				form: {
					phone: '',
					name: '',
					_sent: false,
					_error: false,
					_sending: false
				}
			}
		},
		validations: {
			form: {
				name: { required, minLength: minLength(2) },
				phone: { required, phone }
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

	.callback-form {

	}

</style>
