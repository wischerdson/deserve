<template>
	<div class="pt-24">
		<div class="container">
			<div class="grid gap-x-16 gap-y-28 mt-20 lg:grid-cols-1 pb-28">
				<div v-for="(vacancy, idx) in vacancies" :key="`vacancy-${idx}`">
					<h2 class="text-4xl tracking-rr font-extralight lg:text-3xl">{{ vacancy.title }}</h2>
					<hr class="h-px mb-6 mt-4 bg-gray-500 w-10">
					<p class="text-gray-400 leading-normal tracking-widest font-extralight">{{ vacancy.description }}</p>
					<div>
						<a
							class="btn rounded-full mt-7 space-x-5"
							href="https://getpods.ru"
							target="_blank"
							ref="respondBtn"
						>
							<div class="flex items-center justify-center w-12 h-12 rounded-full bg-white text-black" ref="btnPill">
								<v-icon name="chevron-right" />
							</div>
							<span class="text-xs tracking-rr uppercase text-white">Отликнуться на вакансию</span>
						</a>
					</div>
				</div>
			</div>

			<!-- <v-magnetic>
				<v-magnetic-trigger>Trigger</v-magnetic-trigger>
				<span>Hello world</span>
			</v-magnetic> -->
		</div>
	</div>
</template>

<script>

	export default {
		data () {
			return {
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
		mounted () {
			// this.$magnetic.add({
			// 	element: this.$refs.respondBtn,
			// 	trigger: this.$refs.btnPill,

			// })
		}
	}

</script>