<template>
	<div class="fixed inset-0 bg-black z-30">
		<div class="container">
			<div class="text-right">
				<button class="btn py-6" @click="$emit('close')">
					<v-icon class="-mt-1" name="close" />
					<span>Закрыть</span>
				</button>
			</div>
			<p>Пожалуйста</p>
			<form action="/api/fill-form/vacanancy" @submit.prevent="sendForm">
				<div class="space-y-4">
					<v-input type="text" name="name" v-model="form.name" ref="firstInput">
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
</template>

<script>

	export default {
		props: {
			vacancy: String
		},
		data () {
			return {
				form: {
					vacancy: this.vacancy,
					name: '',
					email: '',
					phone: '',
					message: ''
				}
			}
		},
		methods: {
			sendForm () {

			}
		}
	}

</script>
