<template>
	<transition name="callback-form" mode="out-in">
		<div v-if="!form._filled" key="form">
			<h2 class="text-4xl font-extralight tracking-[.25rem]">Обратный звонок</h2>
			<p class="mt-6 text-gray-400 tracking-widest text-sm font-extralight leading-normal">Заполните форму ниже и мы обязательно свяжемся <br> с вами в ближайшее время.</p>

			<form class="mt-6 space-y-4" action="/api/fill-form/ordering-callback" @submit.prevent="orderCall">
				<fieldset>
					<v-input type="text" v-model="form.name" label="Как к Вам обращаться?" />
				</fieldset>
				<fieldset>
					<v-input-phone v-model="form.phone" label="Ваш номер телефона" />
				</fieldset>
				<div class="pt-8">
					<button class="btn space-x-4" type="submit" ref="submitFormBtn">
						<div class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-400 text-gray-400" ref="submitFormBtnPill">
							<v-icon name="chevron-right" />
						</div>
						<span class="text-xs tracking-rr uppercase text-white font-extralight">Отправить</span>
					</button>
				</div>
			</form>
		</div>
		<div class="thanks max-w-sm" key="thanks" v-else>
			<div class="thanks-title relative">
				<h2 class="text-4xl font-extralight tracking-[.25rem] leading-none relative z-10">Спасибо</h2>
				<div class="absolute bottom-0 left-0 bg-green-900 h-3 w-20"></div>
			</div>
			<p class="thanks-desc tracking-[0.15rem] text-gray-400 text-sm mt-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima et possimus commodi dolorum laboriosam cumque laborum repellat corporis assumenda eum perspiciatis, quidem debitis facere vero, delectus modi sit ullam at!</p>

			<button class="thanks-action btn space-x-4 mt-10" type="submit" ref="submitFormBtn">
				<div class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-400 text-gray-400" ref="submitFormBtnPill">
					<v-icon name="chevron-right" />
				</div>
				<span class="text-xs tracking-rr uppercase text-white font-extralight">Lorem ipsum</span>
			</button>
		</div>
	</transition>
</template>

<script>

	export default {
		data () {
			return {
				magneticSubmitFormBtn: null,
				form: {
					phone: '',
					name: '',
					_filled: false
				}
			}
		},
		methods: {
			orderCall (e) {
				const url = e.target.getAttribute('action')
				this.form._filled = true
				return
				this.$axios.$post(url, this.form).then((d) => {
					console.log(d)


				})
			}
		},
		mounted () {
			this.magneticSubmitFormBtn = this.$magnetic.add({
				element: this.$refs.submitFormBtn,
				trigger: this.$refs.submitFormBtnPill
			})
		}
	}

</script>
