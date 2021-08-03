<template>
	<div class="fixed inset-0 z-200 flex justify-center items-center">
		<div class="fixed inset-0 bg-black/50 z-10"></div>
		<div class="rounded-xl bg-white z-20 relative max-w-5xl w-full px-10 py-4 min-h-[663px]">
			<button class="absolute w-10 h-10 top-0 right-0 flex justify-center items-center" title="Закрыть">
				<div class="w-4 text-gray-600" v-html="require('@/assets/icons/close.svg?raw')"></div>
			</button>
			<div class="mb-9">
				<p class="text-gray-500" v-if="step <= steps">Пройдите тест и получите расчет стоимости сайта</p>
			</div>

			<div class="h-full flex flex-col justify-between">
				<!-- scene 1 -->
				<div v-if="step === 1">
					<div class="text-gray-900 font-medium text-2xl">1. Какой сайт Вам нужен?</div>
					<div class="flex space-x-10 mt-7">
						<div class="w-full">
							<div class="shadow-xl">
								<img class="border-2 border-primary ring-primary ring-4 ring-opacity-50 rounded-lg w-full" :src="require('@/static/img/quiz/quiz-1.png')" alt="">
							</div>
							<div class="text-center font-medium text-gray-700 text-xl mt-2.5">Лендинг (Одностраничный сайт)</div>
						</div>
						<div class="w-full">
							<div class="shadow-xl">
								<img class="w-full" :src="require('@/static/img/quiz/quiz-1.png')" alt="">
							</div>
							<div class="text-center font-medium text-gray-700 text-xl mt-2.5 leading-tight">Многостраничный сайт, <br>интернет-магазин</div>
						</div>
					</div>
				</div>

				<!-- scene 2 -->
				<div v-if="step === 2">
					<div class="text-gray-900 font-medium text-2xl">2. Для чего разрабатывается сайт в первую очередь?</div>
					<div class="flex space-x-10 mt-7">
						<div class="w-full py-6 border-4 border-gray-300 rounded-lg flex flex-col justify-center items-center">
							<img class="w-28" :src="require('@/static/img/quiz/quiz-icon-1.jpg')" alt="">
							<div class="text-center font-medium text-gray-700 text-xl mt-4">Для продаж — нужен <br>постоянный поток клиентов</div>
						</div>
						<div class="w-full py-6 border-4 border-gray-300 rounded-lg flex flex-col justify-center items-center">
							<img class="w-28" :src="require('@/static/img/quiz/quiz-icon-2.jpg')" alt="">
							<div class="text-center font-medium text-gray-700 text-xl mt-4">Для имиджа — хотим <br>красивый сайт для текущих клиентов</div>
						</div>
					</div>
				</div>

				<!-- scene 3 -->
				<div v-if="step === 3">
					<div class="text-gray-900 font-medium text-2xl">3. Есть ли у Вас фирменный стиль? (логотип, цвета компании и т.д.)</div>
					<div class="flex space-x-10 mt-7">
						<div class="w-full py-6 border-4 border-gray-300 rounded-lg flex flex-col justify-center items-center">
							<img class="w-20" :src="require('@/static/img/quiz/quiz-icon-3.svg')" alt="">
							<div class="text-center font-medium text-gray-700 text-xl mt-4">Да</div>
						</div>
						<div class="w-full py-6 border-4 border-gray-300 rounded-lg flex flex-col justify-center items-center">
							<img class="w-20" :src="require('@/static/img/quiz/quiz-icon-4.svg')" alt="">
							<div class="text-center font-medium text-gray-700 text-xl mt-4">Нет</div>
						</div>
					</div>
				</div>

				<!-- scene 4 -->
				<div v-if="step === 4">
					<div class="text-gray-900 font-medium text-2xl">4. Кто будет посетителями Вашего сайта?</div>
					<div class="grid grid-cols-2 gap-5 mt-7">
						<div class="w-full py-6 border-4 border-gray-300 rounded-lg">
							<div class="text-center font-medium text-gray-700 text-xl">Потенциальные покупатели</div>
						</div>
						<div class="w-full py-6 border-4 border-gray-300 rounded-lg">
							<div class="text-center font-medium text-gray-700 text-xl">Владельцы бизнеса</div>
						</div>
						<div class="w-full py-6 border-4 border-gray-300 rounded-lg">
							<div class="text-center font-medium text-gray-700 text-xl">Менеджеры</div>
						</div>
						<div class="w-full py-6 border-4 border-gray-300 rounded-lg">
							<div class="text-center font-medium text-gray-700 text-xl">Другие</div>
						</div>
					</div>
				</div>

				<!-- scene 5 -->
				<div v-if="step === 5">
					<div class="text-gray-900 font-medium text-2xl">Отлично, уже готовим коммерческое предложение! Куда отправить?</div>
					<div class="grid grid-cols-2 gap-5 mt-7">
						<div class="w-full py-6 border-4 border-gray-300 rounded-lg relative flex items-center">
							<img class="w-14 ml-6" :src="require('@/static/img/quiz/quiz-icon-5.jpg')" alt="">
							<div class="w-full text-center absolute font-medium text-gray-700 text-xl">WhatsApp</div>
						</div>
						<div class="w-full py-6 border-4 border-gray-300 rounded-lg relative flex items-center">
							<img class="w-14 ml-6" :src="require('@/static/img/quiz/quiz-icon-6.jpg')" alt="">
							<div class="w-full text-center absolute font-medium text-gray-700 text-xl">Viber</div>
						</div>
						<div class="w-full py-6 border-4 border-gray-300 rounded-lg relative flex items-center">
							<img class="w-14 ml-6" :src="require('@/static/img/quiz/quiz-icon-7.png')" alt="">
							<div class="w-full text-center absolute font-medium text-gray-700 text-xl">Telegram</div>
						</div>
						<div class="w-full py-6 border-4 border-gray-300 rounded-lg relative flex items-center">
							<img class="w-14 ml-6" :src="require('@/static/img/quiz/quiz-icon-8.jpg')" alt="">
							<div class="w-full text-center absolute font-medium text-gray-700 text-xl">Телефон</div>
						</div>
					</div>
				</div>

				<!-- footer -->
				<div class="pb-6">
					<div class="mt-12 w-full h-3 rounded-full overflow-hidden bg-gray-200 relative">
						<div class="absolute inset-y-0 left-0 bg-primary transition-all duration-500" :style="`width: ${100*(step - 1)/steps}%`"></div>
					</div>
					<div class="mt-10 grid grid-cols-3 items-center">
						<div>
							<button class="text-xl bg-gray-200 text-gray-800 px-8 py-3 rounded-lg" @click="step--">Назад</button>
						</div>
						<div>
							<p class="text-lg text-gray-500 text-center" v-if="step <= steps">{{ step }}/{{ steps }}</p>
						</div>
						<div class="text-right">
							<button class="text-xl bg-primary text-white px-8 py-3 rounded-lg ml-auto" @click="step++">
								<span v-if="step < steps">Далее</span>
								<span v-else>Последний вопрос</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	
	export default {
		props: {
			opened: {
				type: Boolean,
				default: true
			}
		},
		data: () => ({
			step: 1,
			steps: 5
		}),
		watch: {
			step (value) {
				this.step = value > 0 ? value : 1
			}
		},
		mounted () {
			// this.steps = this.$slots.default.reduce(((sum, item) => sum + (item.tag ? 1 : 0)), 0) - 1
		}
	}

</script>