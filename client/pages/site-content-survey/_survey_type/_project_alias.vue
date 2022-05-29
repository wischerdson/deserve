<template>
	<div class="pt-16 pb-24">
		<section class="pb-16" v-if="survey">
			<div class="container-lg">
				<h1 class="text-6xl">
					Брифинг сайта @{{ projectName }}
				</h1>
				<p class="mt-6 text-lg">
					Здравствуйте, {{ clientName }}, мы очень рады, что Вы решили работать с нами. На этой странице находится брифинг, данные из которого будут использованы на Вашем сайте. Во время разработки Вы всегда можете зайти на эту страницу и изменить или добавить что-либо. Вот контакт вашего менеджера в  <a class="underline text-green-500" href="https://wa.me/79101127174?text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5%2C%20%D1%83%20%D0%BC%D0%B5%D0%BD%D1%8F%20%D0%B5%D1%81%D1%82%D1%8C%20%D0%B2%D0%BE%D0%BF%D1%80%D0%BE%D1%81" target="_blank">WhatsApp</a>
				</p>
			</div>
		</section>
		<div class="container-lg" v-if="project">
			<div class="space-y-12">
				<form @submit.prevent="saveSurveySection" v-for="(section, i) in project.sections" :key="`section-${i}`">
					<input type="hidden" name="project_id" :value="project.id">
					<div class="relative border-2 border-gray-200 rounded-xl pt-10 pb-8 px-6 space-y-5">
						<h2 class="bg-white absolute left-2 -top-4 px-4 text-xl font-light text-gray-500">{{ section.title }}</h2>

						<div v-for="(field, j) in section.fields" :key="`field-${j}`">
							<label class="font-normal block text-sm" :for="`survey_field_${field.id}`" v-html="field.label"></label>

							<input
								v-if="field.type !== 'textarea'"
								class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-blue-500 focus:ring ring-blue-500/25 block w-full"
								:name="`fields[${field.id}]`"
								:type="field.type"
								:id="`survey_field_${field.id}`"
								:placeholder="field.placeholder"
								@change="field.field_answers[0].content = $event.target.value"
								:value="getAnswer(field)"
							>
							<div v-else>
								<textarea
									class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-blue-500 focus:ring ring-blue-500/25 block w-full"
									:name="`fields[${field.id}]`"
									:id="`survey_field_${field.id}`"
									rows="3"
									@change="field.field_answers[0].content = $event.target.value"
									:value="getAnswer(field)"
								></textarea>
								<div class="text-sm mt-2 mb-6">
									<div class="mb-1.5 font-medium text-blue-500">Пример</div>
									<p class="border-l-2 border-blue-500 pl-2" v-html="field.placeholder.replace(/\n/g, '<br />')"></p>
								</div>
							</div>

						</div>

						<button class="bg-blue-500 text-white rounded-md px-6 py-2.5 hover:bg-blue-600 transition-colors ml-auto flex" type="submit">Сохранить</button>
					</div>
				</form>
			</div>

		</div>

		<div class="fixed top-6 bg-gray-50 right-6 shadow-lg px-8 py-4 rounded-lg overflow-hidden" v-show="savedSuccessful">
			Сохранено
			<div class="w-0.5 absolute right-0 top-0 bottom-0 bg-green-600"></div>
		</div>
		<div class="fixed top-6 bg-gray-50 right-6 shadow-lg px-8 py-4 rounded-lg overflow-hidden" v-show="savingFailed">
			Произошла ошибка
			<div class="w-0.5 absolute right-0 top-0 bottom-0 bg-red-600"></div>
		</div>
	</div>
</template>

<script>

import { getSurvey, saveSurveyFields } from '~/services/api'

export default {
	layout: 'survey',
	async fetch () {
		const surveyType = this.$route.params.survey_type
		this.projectName = this.$route.params.project_alias
		this.clientName = this.$route.query.client_name

		await getSurvey(surveyType, this.projectName).then(({ data }) => {
			this.survey = data.survey
			this.project = data.project
		})
	},
	fetchOnServer: false,
	data () {
		return {
			projectName: '',
			clientName: '',
			survey: null,
			project: null,
			savedSuccessful: false,
			savingFailed: false
		}
	},
	methods: {
		saveSurveySection ({ target }) {
			const formdata = new FormData(target)

			saveSurveyFields(formdata)
				.then(() => this.setStatus(true))
				.catch(() => this.setStatus(false))
		},
		setStatus (succeed) {
			succeed ? this.savedSuccessful = true : this.savingFailed = true
			setTimeout(() => {
				this.savedSuccessful = false
				this.savingFailed = false
			}, 2000)
		},
		getAnswer (field) {
			if (!field.field_answers.length) {
				field.field_answers = [{
					'content': ''
				}]
			}

			return field.field_answers[0].content
		}
	}
}

</script>
