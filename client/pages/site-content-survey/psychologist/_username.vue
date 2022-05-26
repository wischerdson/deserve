<template>
	<div class="pt-16 pb-24">
		<section class="pb-16">
			<div class="container-lg">
				<h1 class="text-6xl">Заголовок ({{ username }})</h1>
				<p class="mt-6 text-lg">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem nemo dolorum quae minus, est facilis, fugiat nulla a magnam suscipit adipisci eveniet magni ipsa deleniti vitae libero praesentium rem quo at eos vel officia necessitatibus voluptatibus cupiditate? Quod blanditiis accusantium quasi sit quas magnam, assumenda adipisci nisi eos sint amet, eveniet delectus repudiandae. Facere rerum earum inventore.</p>
			</div>
		</section>
		<div class="container-lg">
			<form @submit.prevent>
				<div class="relative border-2 border-gray-200 rounded-xl pt-10 pb-8 px-6 space-y-5">
					<h2 class="bg-white absolute left-2 -top-4 px-4 text-xl font-light text-gray-500">Главный экран</h2>

					<fieldset>
						<label class="font-normal block text-sm" for="survey__full_name">Ваше полное имя</label>
						<input class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-gray-500 block w-full" type="text" id="survey__full_name" placeholder="Лебедева Анна Геннадьевна">
					</fieldset>
					<fieldset>
						<label class="font-normal block text-sm" for="survey__full_name">Ваше полное имя</label>
						<input class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-gray-500 block w-full" type="text" id="survey__full_name" placeholder="Лебедева Анна Геннадьевна">
					</fieldset>
					<fieldset>
						<label class="font-normal block text-sm" for="survey__full_name">Ваше полное имя</label>
						<input class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-gray-500 block w-full" type="text" id="survey__full_name" placeholder="Лебедева Анна Геннадьевна">
					</fieldset>
					<fieldset>
						<label class="font-normal block text-sm" for="survey__full_name">Ваше полное имя</label>
						<input class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-gray-500 block w-full" type="text" id="survey__full_name" placeholder="Лебедева Анна Геннадьевна">
					</fieldset>

					<button class="bg-blue-500 text-white rounded-md px-6 py-2.5 hover:bg-blue-600 transition-colors ml-auto flex" type="submit">Сохранить</button>
				</div>
			</form>

			<form class="mt-12 relative border-2 border-gray-200 rounded-xl pt-10 pb-8 px-6 space-y-5" @submit.prevent>
				<h2 class="bg-white absolute left-2 -top-4 px-4 text-xl font-light text-gray-500">Главный экран</h2>

				<fieldset>
					<label class="font-normal block text-sm" for="survey__full_name">Ваше полное имя</label>
					<input class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-gray-500 block w-full" type="text" id="survey__full_name" placeholder="Лебедева Анна Геннадьевна">
				</fieldset>
				<fieldset>
					<label class="font-normal block text-sm" for="survey__full_name">Ваше полное имя</label>
					<input class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-gray-500 block w-full" type="text" id="survey__full_name" placeholder="Лебедева Анна Геннадьевна">
				</fieldset>
				<fieldset>
					<label class="font-normal block text-sm" for="survey__full_name">Ваше полное имя</label>
					<input class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-gray-500 block w-full" type="text" id="survey__full_name" placeholder="Лебедева Анна Геннадьевна">
				</fieldset>
				<fieldset>
					<label class="font-normal block text-sm" for="survey__full_name">Ваше полное имя</label>
					<input class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-gray-500 block w-full" type="text" id="survey__full_name" placeholder="Лебедева Анна Геннадьевна">
				</fieldset>

				<button class="bg-blue-500 text-white rounded-md px-6 py-2.5 hover:bg-blue-600 transition-colors ml-auto flex" type="submit">Сохранить</button>
			</form>

			<!-- {{ username }} -->
		</div>
	</div>
</template>

<script>

export default {
	layout: 'survey',
	fetch () {
		this.username = this.$route.params.username
	},
	data () {
		return {
			username: ''
		}
	}
}

</script>
