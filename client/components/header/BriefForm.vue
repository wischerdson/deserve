<template>
	<transition :duration="200">
		<div class="brief pb-32 pt-28 max-w-sm" v-if="enableAnimation">
			<h2 class="title text-4xl sm:text-3xl font-extralight tracking-rr">Оставьте заявку</h2>
			<p class="desc text-gray-500 leading-normal font-extralight tracking-wider mt-3">Расскажите о своем проекте и мы с удовольствием включимся в него на любом этапе.</p>
			<form class="mt-6 space-y-6" action="/api/fill-form/brief" @submit.prevent="orderCall" novalidate>
				<fieldset>
					<v-input type="text" v-model="form.name" label="Как к Вам обращаться?" />
				</fieldset>
				<fieldset>
					<v-input-phone v-model="form.phone" label="Ваш номер телефона" />
				</fieldset>
				<fieldset>
					<v-input type="email" v-model="form.email" label="Ваш email" />
				</fieldset>
				<fieldset>
					<v-select v-model="form.budget" label="Планируемый бюджет">
						<option class="text-black" value="" selected></option>
						<option class="text-black" value="До 500 тыс.">До 500 тыс.</option>
						<option class="text-black" value="0.5 - 1 млн.">0.5 - 1 млн.</option>
						<option class="text-black" value="1 - 3 млн.">1 - 3 млн.</option>
						<option class="text-black" value="От 3 млн.">От 3 млн.</option>
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
		</div>
	</transition>
</template>

<script>

	export default {
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
		methods: {
			orderCall (e) {
				const url = e.target.getAttribute('action')

				this.$axios.$post(url, this.form).then(() => {
					this.form._sent = true
				}).catch(() => {
					this.form._error = true
				})
			}
		},
	}

</script>

<style lang="scss">

	.brief {
		&.v-enter-active {
			.title, .desc, fieldset {
				transition: transform .7s ease, opacity .7s ease;
			}
			.form-control-underline.default {
				transition: transform 1s ease;
			}
			.title { transition-delay: .3s; }
			.desc { transition-delay: .45s; }
			@for $i from 1 through 6 {
				fieldset:nth-child(#{$i}) {
					transition-delay: #{.45 + ($i) * .1}s;

					.form-control-underline.default {
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
			.form-control-underline.default {
				transform: scaleX(0);
			}
		}
	}

</style>
