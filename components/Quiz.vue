<template>
	<quiz :opened="true">
		<scene :step="1">
			<div class="text-gray-900 font-medium text-2xl">1. Какой сайт Вам нужен?</div>
			<div class="flex space-x-10 mt-4">
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
		</scene>
		<scene :step="2">
			Scene 2
		</scene>
		<scene :step="3">
			<p class="py-4">Scene 3</p>
		</scene>
	</quiz>
</template>

<script>
	
	import Quiz from '@/components/quiz/Quiz'
	import Scene from '@/components/quiz/Scene'

	export default {
		components: { Quiz, Scene }
	}

</script>