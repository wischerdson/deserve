<template>
	<transition :duration="2000">
		<div class="brief-form pb-20 pt-28 max-w-sm" v-show="enableAnimation">
			<h2 class="title text-4xl sm:text-3xl font-extralight tracking-rr">Оставьте заявку</h2>
			<p class="desc text-gray-500 leading-normal font-extralight tracking-wider mt-3">Расскажите о своем проекте и мы с удовольствием включимся в него на любом этапе.</p>
			<form class="mt-6 space-y-6" action="/api/fill-form/brief" @submit.prevent="orderCall" novalidate>
				<fieldset>
					<v-input
						type="text"
						v-model="form.name"
						label="Как к Вам обращаться?"
					/>
					  <!-- <div class="error" v-if="$v.form.name.$error && !$v.form.name.required">Field is required</div> -->
					<!-- <pre>{{ form.name }}</pre> -->
				</fieldset>
				<fieldset>
					<v-input-phone v-model="form.phone" label="Ваш номер телефона" />
				</fieldset>
				<fieldset>
					<v-input type="email" v-model="form.email" label="Ваш email" />
				</fieldset>
				<fieldset>
					<v-select v-model="form.budget" label="Планируемый бюджет">
						<option class="text-black font-normal" value="" selected></option>
						<option class="text-black font-normal" value="До 500 тыс.">До 500 тыс.</option>
						<option class="text-black font-normal" value="0.5 - 1 млн.">0.5 - 1 млн.</option>
						<option class="text-black font-normal" value="1 - 3 млн.">1 - 3 млн.</option>
						<option class="text-black font-normal" value="От 3 млн.">От 3 млн.</option>
					</v-select>
				</fieldset>
				<fieldset>
					<v-textarea v-model="form.task_description" label="Опишите задачу, которую хотите решить" />
				</fieldset>
				<fieldset class="pt-8">
					<button class="btn space-x-4" type="submit" ref="submitFormBtn">
						<div class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-400 text-gray-400" ref="submitFormBtnPill">
							<v-icon name="chevron-right" />
						</div>
						<span class="text-xs tracking-rr uppercase text-white font-extralight">Отправить</span>
					</button>
				</fieldset>
			</form>
			<div class="mt-16">
				<p class="text-xs text-gray-600 tracking-wider">Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c <nuxt-link class="hover:underline text-gray-400" to="/legal/privacy-policy">политикой конфиденциальности</nuxt-link></p>
			</div>
		</div>
	</transition>
</template>

<script>

	import { validationMixin } from 'vuelidate'
	import { required, minLength } from 'vuelidate/lib/validators'

	export default {
		// mixins: [ validationMixin ],
		props: {
			enableAnimation: Boolean
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
					_error: false
				}
			}
		},
		validations: {
			form: {
				name: {
					required,
					minLength: minLength(2)
				}
			}
		},
		methods: {
			orderCall (e) {
				const url = e.target.getAttribute('action')

				this.$axios.$post(url, this.form).then(() => {
					this.form._sent = true
				}).catch(() => {
					this.form._error = true
				})
			}
		}
	}

</script>

<style lang="scss">

	.brief-form {
		&.v-enter-active {
			.title, .desc, fieldset {
				transition: transform .7s ease, opacity .7s ease;
			}

			.ui-base-input__underline.default {
				transition: transform 1s ease;
			}

			.title { transition-delay: .2s; }

			.desc { transition-delay: .3s; }

			@for $i from 1 through 6 {
				fieldset:nth-child(#{$i}) {
					transition-delay: #{.3 + ($i) * .1}s;

					.ui-base-input__underline.default {
						transform-origin: 0;
						transition-delay: #{.55 + ($i) * .1}s;
					}
				}
			}
		}

		&.v-enter {
			.title, .desc, fieldset {
				transform: translateY(20px);
				opacity: 0;
			}

			.ui-base-input__underline.default {
				transform: scaleX(0);
			}
		}
	}

</style>
