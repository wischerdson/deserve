<template>
	<div class="pb-32 pt-28 max-w-sm">
		<h2 class="text-4xl sm:text-3xl font-extralight tracking-rr">Оставьте заявку</h2>
		<p class="text-gray-500 leading-normal font-extralight tracking-wider mt-3">Расскажите о своем проекте и мы с удовольствием включимся в него на любом этапе.</p>
		<form class="mt-6 space-y-6" action="/api/fill-form/brief" @submit.prevent="orderCall" novalidate>
			<fieldset>
				<v-input type="text" name="name" v-model="form.name">
					<template v-slot:label>Как к Вам обращаться?</template>
				</v-input>
			</fieldset>
			<fieldset>
				<v-input type="phone" name="phone" v-model="form.phone">
					<template v-slot:label>Ваш номер телефона</template>
				</v-input>
			</fieldset>
			<fieldset>
				<v-input type="email" name="email" v-model="form.email">
					<template v-slot:label>Ваш email</template>
				</v-input>
			</fieldset>
			<fieldset>
				<v-select name="budget" v-model="form.budget">
					<template #label>Планируемый бюджет</template>
					<option class="text-black" value="" selected></option>
					<option class="text-black" value="До 500 тыс.">До 500 тыс.</option>
					<option class="text-black" value="0.5 - 1 млн.">0.5 - 1 млн.</option>
					<option class="text-black" value="1 - 3 млн.">1 - 3 млн.</option>
					<option class="text-black" value="От 3 млн.">От 3 млн.</option>
				</v-select>
			</fieldset>
			<fieldset>
				<v-input type="textarea" name="tesk_description" v-model="form.task_description">
					<template v-slot:label>Опишите задачу, которую хотите решить</template>
				</v-input>
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
</template>

<script>

	export default {
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
