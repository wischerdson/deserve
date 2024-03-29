<template>
	<div class="pt-24">
		<div class="container">
			<div class="grid grid-cols-2 gap-x-16 gap-y-28 mt-20 lg:grid-cols-1 pb-28">
				<!-- class="relative pb-20" -->
				<div v-for="(vacancy, idx) in vacancies" :key="`vacancy-${idx}`">
					<h2 class="text-4xl tracking-rr font-extralight lg:text-3xl">{{ vacancy.title }}</h2>
					<hr class="h-px mb-6 mt-4 bg-gray-500 w-10">
					<p class="text-gray-400 leading-normal tracking-widest font-extralight">{{ vacancy.description }}</p>
					<!-- class="absolute bottom-0 left-0" -->
					<div>
						<v-action-pill
							class="mt-7"
							@click="openVacancyForm(vacancy.title)"
							text="Отликнуться на вакансию"
						/>
					</div>
				</div>
			</div>
		</div>
		<vacancy-form v-show="vacancyForm" :vacancy="selectedVacancy" @close="vacancyForm = false" />
	</div>
</template>

<script>

	import VacancyForm from '~/components/vacancies/VacancyForm'
	import { disablePageScroll, enablePageScroll, addFillGapTarget } from 'scroll-lock'

	export default {
		components: { VacancyForm },
		head () {
			return {
				title: 'Вакансии - Deserve',
				description: 'Deserve приглашает на работу программистов, дизайнеров, контекстологов, таргетологов, SEO-специалистов, менеджеров проектов и менеджеров по продажам.',
				meta: [
					{ property: 'og:title', content: 'Вакансии - Deserve', hid: 'og-title' },
					{ property: 'og:description', content: 'Deserve приглашает на работу программистов, дизайнеров, контекстологов, таргетологов, SEO-специалистов, менеджеров проектов и менеджеров по продажам.', hid: 'og-description' },
				]
			}
		},
		data () {
			return {
				vacancyForm: false,
				selectedVacancy: null,
				vacancies: [
					{
						title: 'Web-дизайнер на Tilda',
						description: 'Разработка креативных концепций и дизайна сайтов. Сборка сайтов на конструкторе Tilda. Разработка дизайна отдельных макетов страниц сайтов, баннеров, smm-дизайн... Наличие портфолио (ссылка обязательна). Уверенное владение: Adobe Photoshop, Tilda, Adobe Illustrator, Figma, Adobe After Effects. Базовое понимание принципов верстки.',
					},
					{
						title: 'Frontend-разработчик',
						description: 'Умение грамотно спроектировать интерфейс сайта, увереное владение SCSS, нативным JavaScript (ES6/ES7 etc.); базовое умение настройки webpack, опыт с VueJS; желателен опыт работы с TailwindCSS.',
					},
					{
						title: 'Backend-разработчик',
						description: 'Уверенное знание PHP и ООП, знание SQL, базовое представление о работе сети, протокола HTTP, понимание шаблона MVC, знание принципа REST API, опыт работы с фреймворком Laravel.',
					},
					{
						title: 'Менеджер по ведению проектов',
						description: 'Поиск и работа с фрилансерами. Участие в видео совещаниях. Подготовка технических заданий для исполнителей. Координация работы, обеспечение оперативного обмена информацией. Умеющего создавать открытые и прозрачные отношения внутри команды и с клиентом. Обладающего высокими аналитическими способностями. Умеющего вникать в суть проекта.',
					},
					{
						title: 'Копирайтер',
						description: 'Писать емкие и конверсионные тексты. Превращать тезисы с описанием продукта в красивый структурированный текст. Отличная грамотность. Умение писать просто и ясно и в то же время ярко и образно. Четкое соблюдение дедлайнов.',
					},

					{
						title: 'Менеджер по продажам',
						description: 'Активная работа с лидами: Звонки, квалификация и выявление потребностей клиента закрытие в продажу. Контроль получения оплаты до момента прихода денег... Требуемый опыт работы в продажах: от года. Нам важно что бы вы были коммуникабельны, энергичны, осознанны, заряжены на результат.',
					},
					{
						title: 'Таргетолог',
						description: 'Планирование, создание и анализ эффективности рекламных кампаний. Ежедневная генерация гипотез по улучшению текущих рекламных кампаний. Достижение KPI по объему и стоимости лидов. Отличные теоретические знания Facebook Ads. Пиксель, оптимизация, цели, кастомные аудитории и события, планирование, тестирование и масштабирование.',
					},
					{
						title: 'Менеджер по работе с иностранными клиентами',
						description: 'Свободное знание английского языка с опытом ведения разговора в деловом стиле. Участие в видео совещаниях. Подготовка технических заданий для исполнителей. Координация работы, обеспечение оперативного обмена информацией. Умеющего создавать открытые и прозрачные отношения внутри команды и с клиентом. Обладающего высокими аналитическими способностями. Умеющего вникать в суть проекта.',
					},
				]
			}
		},
		watch: {
			vacancyForm (value) {
				value ? disablePageScroll() : enablePageScroll()
			}
		},
		methods: {
			openVacancyForm (vacancy) {
				this.selectedVacancy = vacancy
				this.vacancyForm = true
			}
		},
		mounted () {
			addFillGapTarget(this.$el)
		}
	}

</script>
