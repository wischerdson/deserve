<template>
	<div class="py-16">
		<div class="container">
			<div>
				<nuxt-link
					class="bg-blue-500 text-white rounded-md px-6 py-2.5 hover:bg-blue-600 transition-colors"
					to="/sites/create"
				>Добавить</nuxt-link>
			</div>
			<div class="pt-10 pb-5 flex space-x-6 whitespace-nowrap overflow-auto" v-if="statistics">
				<div>
					<span>Всего бомжей: </span>
					<span class="font-medium">{{ statistics.total }}</span>
				</div>
				<div class="text-amber-500">
					<span>Думают: </span>
					<span class="font-medium">{{ statistics.count_before }}</span>
				</div>
				<div class="text-red-500">
					<span>Внесли предоплату: </span>
					<span class="font-medium">{{ statistics.count_payment }}</span>
				</div>
				<div class="text-green-500">
					<span>Закрыты: </span>
					<span class="font-medium">{{ statistics.count_completed }}</span>
				</div>
			</div>
			<div class="w-full overflow-x-auto mt-5" v-if="projects">
				<table class="w-full min-w-[1100px] border-collapse font-normal">
					<thead class="text-left">
						<tr>
							<th class="px-4">Дата</th>
							<th class="px-4">Логин</th>
							<th class="px-4">Телефон</th>
							<th class="px-4">Имя</th>
							<th class="px-4"></th>
							<th class="px-4">Статус</th>
							<th class="px-4">Осталось дней</th>
							<th class="px-4"></th>
						</tr>
					</thead>
					<tbody class="font-medium">
						<tr
							:class="{'bg-gray-100': idx % 2 === 0}"
							v-for="(project, idx) in projects"
							:key="`project-${idx}`"
						>
							<td class="px-4 py-2.5 whitespace-nowrap">{{ project.created_at_formatted }}</td>
							<td class="px-4">{{ project.alias }}</td>
							<td class="px-4">
								<a
									class="underline text-blue-500"
									v-if="project.phone"
									:href="`https://wa.me/${project.phone}`"
									target="_blank"
								>{{ project.phone }}</a>
								<span v-else>-</span>
							</td>
							<td class="px-4">{{ project.name }}</td>
							<td class="underline text-blue-500 px-4">
								<a :href="project.link" target="_blank">Ссылка</a>
							</td>
							<td
								class="px-4"
								:class="{
									'text-red-500': project.status_color == 'red',
									'text-amber-500': project.status_color == 'yellow',
									'text-green-600': project.status_color == 'green'
								}"
								v-if="project.status"
							>
								<button @click="changeStatus(project)">{{ project.status_name }}</button>
							</td>
							<td class="px-4" v-else></td>
							<td class="px-4">{{ project.deadline_days }}</td>
							<td class="px-4">
								<button @click="remove(project)" class="text-red-500 underline">Удалить</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script>

import { getProjects, setProjectStatus, removeProject, getSurveyStatistics } from '~/services/api'

String.prototype.ucfirst = function () {
	return this[0].toUpperCase() + this.slice(1)
}

export default {
	layout: 'survey',
	async fetch () {
		return Promise.all([
			getProjects().then(({ data }) => {
				this.projects = data.map(item => {
					const status = this.getStatus(item.status)
					item.created_at_formatted = this.transformCreatedAt(item.created_at)
					item.name = item.name || '-'
					item.status_name = status.name
					item.status_color = status.color
					item.deadline_days = this.getDeadlineDays(item.created_at)
					item.link = this.getLink(item.alias)

					return item
				})
			}),
			getSurveyStatistics().then(({ data }) => this.statistics = data)
		])
	},
	fetchOnServer: false,
	data () {
		return {
			projects: null,
			statistics: null
		}
	},
	methods: {
		transformCreatedAt (timestamp) {
			const months = 'январь,февраль,март,апрель,май,июнь,июль,август,сентябрь,октябрь,ноябрь,декабрь'
			const date = new Date()
			date.setTime(timestamp*1000)

			return `${months.split(',')[date.getMonth()].ucfirst()}, ${date.getDate()} ${date.getFullYear()}г`
		},
		getDeadlineDays (created_at) {
			const TOTAL = 20
			const createdAt = new Date()
			createdAt.setTime((created_at + TOTAL*24*60*60)*1000)
			const diff = createdAt.getTime() - new Date().getTime()

			return diff > 0 ? Math.floor(diff/(1000*60*60*24)) : 0
		},
		getLink (alias) {
			return `${this.$config.appURL}/site/psy/${alias.replaceAll('.', '-')}`
		},
		getStatus (status) {
			switch (status) {
				case 'before':
					return { name: 'Думает', color: 'yellow'}
				case 'payment':
					return { name: 'Предоплата', color: 'red'}
				case 'completed':
					return { name: 'Закрыто', color: 'green'}
			}
		},
		changeStatus (project) {
			switch (project.status) {
				case 'before': project.status = 'payment'; break;
				case 'payment': project.status = 'completed'; break;
				case 'completed': project.status = 'before'; break;
			}

			const status = this.getStatus(project.status)
			project.status_name = status.name
			project.status_color = status.color

			setProjectStatus({ project_id: project.id, status: project.status })
		},
		remove (project) {
			if (confirm(`Точно удалить @${project.alias}?`)) {
				removeProject(project.id).then(() => {
					this.projects = this.projects.filter(item => item.id !== project.id)
				})
			}
		}
	}
}

</script>
