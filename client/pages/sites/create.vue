<template>
	<div class="py-16">
		<div class="max-w-sm mx-auto px-4">
			<nuxt-link class="inline-flex items-center text-blue-500 space-x-1 leading-none" to="/sites">
				<v-icon name="chevron-left" />
				<span>Назад</span>
			</nuxt-link>
			<form class="space-y-4 mt-8" @submit.prevent="createProject">
				<div>
					<label class="font-normal block text-sm" for="create_project__type">Тип</label>
					<select
						class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-blue-500 focus:ring ring-blue-500/25 block w-full"
						name="type"
						id="create_project__type"
						v-model="form.type"
					>
						<option value="psy" selected>Психолог</option>
					</select>
				</div>
				<div>
					<label class="font-normal block text-sm" for="create_project__name">Имя</label>
					<input
						class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-blue-500 focus:ring ring-blue-500/25 block w-full"
						name="name"
						type="text"
						id="create_project__name"
						v-model="form.name"
					>
				</div>
				<div>
					<label class="font-normal block text-sm" for="create_project__login">Логин</label>
					<input
						class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-blue-500 focus:ring ring-blue-500/25 block w-full"
						name="login"
						type="text"
						id="create_project__login"
						v-model="form.login"
					>
				</div>
				<div>
					<label class="font-normal block text-sm" for="create_project__phone">Телефон</label>
					<input
						class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-blue-500 focus:ring ring-blue-500/25 block w-full"
						name="phone"
						type="tel"
						id="create_project__phone"
						v-model="form.phone"
					>
				</div>
				<button
					class="bg-blue-500 text-white rounded-md px-6 py-2.5 hover:bg-blue-600 transition-colors block ml-auto"
					type="submit"
				>Добавить</button>
			</form>
		</div>
	</div>
</template>

<script>

import { createProject } from '~/services/api'

export default {
	layout: 'survey',
	data () {
		return {
			form: {
				type: 'psy',
				name: '',
				phone: '',
				login: ''
			}
		}
	},
	methods: {
		createProject () {
			createProject(this.form).then(() => this.$router.push('/sites'))
		}
	}
}

</script>
