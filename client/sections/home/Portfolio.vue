<template>
	<section class="space-y-40 sm:space-y-28">
		<portfolio-project
			v-for="(project, idx) in projects"
			:project="project"
			:key="`project_${idx}`"
		/>

		<div class="w-full pb-44 lg:pb-28 flex items-center" ref="viewAllWorksScreen">
			<div class="container">
				<div class="w-full max-w-[720px] mx-auto lg:max-w-max lg:mx-0 lg:pl-6">
					<div ref="screenTitle">
						<div class="mb-10">
							<span class="text-sm text-gray-500 tracking-widest font-extralight">What's next?</span>
						</div>
						<h2 class="text-8xl font-extralight tracking-wider lg:text-5xl">Всё портфолио</h2>
					</div>
					<div class="mt-10" ref="viewAllWorksBtn">
						<v-action-pill
							to="/portfolio"
							text="Посмотреть"
							title="View all works"
						/>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>

import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import PortfolioProject from '~/components/PortfolioProject'

export default {
	data () {
		return {
			projects: [
				{
					subtitle: 'Психотерапевт',
					name: 'Валерия Кумпф',
					desc: 'Минималистичный и интуитивно понятный сайт для практикующего психолога. Проект включает индивидуальный дизайн, подчеркивающий атмосферу доверия и спокойствия, а также удобную структуру для записи на консультации и получения информации об услугах. Сайт адаптирован под все устройства и оптимизирован для продвижения в поисковых системах. Особое внимание уделено простоте обновления контента и быстрой навигации для пользователей.',
					url: 'https://kumpfsmartpsychology.ru',
					image: require('~/static/image/kumpf.jpg'),
					mobileImage: require('~/static/image/kumpf.jpg'),
					instagram: {
						title: '@valeria_kumpf',
						href: 'https://www.instagram.com/valeria_kumpf'
					}
				},
				{
					subtitle: 'Медицинский центр',
					name: 'Клиника <br>"Для Друзей" <br>на Рублевке',
					desc: 'Сайт для медицинского центра «Для Друзей» — уютной клиники в посёлке «Ландшафт» на Рублёвке. Акцент сделан на приватности, доверительной атмосфере и высоком уровне сервиса. Представлены ключевые услуги: лабораторные анализы ДНКОМ, IV-терапия, массаж и консультации ведущих специалистов.',
					url: 'https://forfriends.ru',
					image: require('~/static/image/project-forfriends.jpg'),
					mobileImage: require('~/static/image/project-forfriends.jpg')
				},
				{
					subtitle: 'СТУДИЯ АРХИТЕКТУРЫ И ДИЗАЙНА',
					name: 'AN ARCHITECTS',
					desc: 'Разработан сайт для архитектурной студии AN ARCHITECTS — команды, создающей уникальные проекты для бизнеса и частных клиентов. Реализована адаптивная платформа с акцентом на визуальное представление портфолио, включая коммерческие интерьеры, частные дома и архитектурные объекты. Сайт обеспечивает удобную навигацию, быструю загрузку и простую форму обратной связи для потенциальных клиентов.',
					url: 'https://anarchitects.world',
					image: require('~/static/image/project-architects.jpg'),
					mobileImage: require('~/static/image/project-architects.jpg')
				},
				{
					subtitle: 'YouTube, Instagram блогер',
					name: 'Афоня TV',
					desc: 'Разработан сайт для проекта Like a God — онлайн-курса по личному брендингу и самопрезентации. Сайт выполнен в виде лендинга с акцентом на визуальный стиль, минимализм и эмоциональную подачу. Реализована адаптивная верстка, анимации и форма регистрации, обеспечивающие удобство использования на различных устройствах.',
					url: 'https://likeagod.deserve.ru',
					image: require('~/static/image/project-afonya.png'),
					mobileImage: require('~/static/image/project-afonya.png'),
					instagram: {
						title: '@afonyatv',
						href: 'https://www.instagram.com/afonyatv'
					}
				},
				{
					subtitle: 'Застройщик',
					name: 'Метрум груп',
					desc: '«Метрум Групп» — один из ведущих застройщиков Смоленска и области. Сайт представляет ключевые жилые комплексы с подробной информацией о проектах, визуализацией и удобной навигацией. Реализована адаптивная верстка, обеспечивающая корректное отображение на различных устройствах, и базовая SEO-оптимизация для повышения видимости в поисковых системах. Особое внимание уделено простоте обновления контента и быстрой навигации для пользователей.',
					url: 'https://metrumgroup.ru',
					image: require('~/static/image/project-metrumgroup.jpeg'),
					mobileImage: require('~/static/image/project-metrumgroup.jpeg')
				},
				{
					subtitle: 'Реселлер Apple',
					name: 'GetPods.ru',
					desc: 'Разработан высоконагруженный e-commerce сайт для сети магазинов GetPods — реселлера техники Apple и других брендов в России. Сайт адаптирован для всех устройств, интегрирован с системой онлайн-оплаты и поддерживает удобную навигацию для пользователей. Особое внимание уделено производительности и безопасности.',
					url: 'https://getpods.deserve.ru',
					image: require('~/static/image/project-getpods.png')
				},
				{
					subtitle: 'Международная платформа для врачей всех специальностей',
					name: 'МЕДЛЕКТОРИЙ',
					desc: 'Разработан сайт для образовательной платформы «Медлекторий», предлагающей вебинары и курсы для врачей-косметологов и руководителей клиник. Сайт обеспечивает удобную навигацию, адаптивный дизайн и интеграцию с системой онлайн-оплаты. Особое внимание уделено презентации программ обучения и легкости доступа к материалам.',
					url: 'https://medlektorij.ru',
					image: require('~/static/image/project-medlectoriy.jpg'),
					mobileImage: require('~/static/image/project-medlectoriy.jpg')
				},
				{
					subtitle: 'СТУДИЯ АРХИТЕКТУРЫ И ДИЗАЙНА',
					name: 'AN ARCHITECTS',
					desc: 'Разработан сайт для архитектурной студии AN ARCHITECTS — команды, создающей уникальные проекты для бизнеса и частных клиентов. Реализована адаптивная платформа с акцентом на визуальное представление портфолио, включая коммерческие интерьеры, частные дома и архитектурные объекты. Сайт обеспечивает удобную навигацию, быструю загрузку и простую форму обратной связи для потенциальных клиентов.',
					url: 'https://anarchitects.world',
					image: require('~/static/image/project-architects.jpg'),
					mobileImage: require('~/static/image/project-architects.jpg')
				},
				{
					subtitle: 'Instagram-блогер',
					name: 'Михаил Тимочко',
					desc: 'Реализация telegram-бота для воронки продаж курса "Сайты, Деньги, 2 ствола"',
					url: 'https://t.me/timoch4ko2k',
					image: require('~/static/image/project-timochko.png'),
					instagram: {
						title: '@mikhail.timochko',
						href: 'https://www.instagram.com/mikhail.timochko'
					}
				}
			]
		}
	},
	components: { PortfolioProject },
	mounted () {
		gsap.registerPlugin(ScrollTrigger)

		const tl = gsap.timeline()
		tl.fromTo(this.$refs.screenTitle, { opacity: 0, y: 40 }, { opacity: 1, y: 0 }, 0).addLabel('start')
		tl.fromTo(this.$refs.viewAllWorksBtn, { opacity: 0, y: 40 }, { opacity: 1, y: 0 }, 'start-=60%')

		ScrollTrigger.create({
			animation: tl,
			trigger: this.$refs.viewAllWorksScreen,
			start: '-25% center',
			end: '40% center',
			scrub: true
		})
	}
}

</script>
