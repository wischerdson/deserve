<template>
	<div class="pt-16 pb-24">
		<section class="pb-16" v-if="survey">
			<div class="container-lg">
				<h1 class="text-6xl" v-html="survey.title"></h1>
				<p class="mt-6 text-lg" v-html="survey.description"></p>
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
							<textarea
								v-else
								class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-blue-500 focus:ring ring-blue-500/25 block w-full"
								:name="`fields[${field.id}]`"
								:id="`survey_field_${field.id}`"
								rows="3"
								:placeholder="field.placeholder"
								@change="field.field_answers[0].content = $event.target.value"
								:value="getAnswer(field)"
							>

							</textarea>
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
		const projectAlias = this.$route.params.project_alias

		await getSurvey(surveyType, projectAlias).then(({ data }) => {
			this.survey = data.survey
			this.project = data.project
		})
	},
	fetchOnServer: false,
	data () {
		return {
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
