<template>
	<footer class="mt-28">
		<div class="container">
			<div class="flex justify-between">
				<div class="flex">
					<div class="pr-8 max-w-sm">
						<v-icon width="120px" name="deserve-full-logo" />
						<div class="mt-5">
							<p class="text-sm text-gray-400 leading-relaxed tracking-wider">Use this tool as test data for an automated system or find your next pen.</p>
						</div>
					</div>
					<div class="border-l border-gray-600 pl-12 max-w-[282px]">
						<h2 class="text-xl font-extralight tracking-wider">О компании</h2>
						<hr class="w-8 h-px bg-gray-500 my-6">
						<p class="text-sm text-gray-400 leading-relaxed tracking-wider">But horizontal lines can only be full pixel high</p>
						<div class="mt-8">
							<nuxt-link class="btn btn-outline px-10 tracking-wider text-gray-400 border-gray-400 hover:border-white hover:text-white transition-colors" to="#">More info</nuxt-link>
						</div>
						<div class="mt-6">
							<nuxt-link class="btn btn-outline px-10 tracking-wider text-gray-400 border-gray-400 hover:border-white hover:text-white transition-colors" to="#">Contact us</nuxt-link>
						</div>
					</div>
				</div>
				<div>
					<h2 class="text-xl font-extralight tracking-wider">Навигация</h2>
					<hr class="w-8 h-px bg-gray-500 my-6">
					<nav class="space-y-5 text-gray-400 text-sm tracking-wider">
						<div>
							<nuxt-link class="hover:text-white" to="#">Главная</nuxt-link>
						</div>
						<div>
							<nuxt-link class="hover:text-white" to="#">Об агентстве</nuxt-link>
						</div>
						<div>
							<nuxt-link class="hover:text-white" to="#">Портфолио</nuxt-link>
						</div>
						<div>
							<nuxt-link class="hover:text-white" to="#">Вакансии</nuxt-link>
						</div>
						<div>
							<nuxt-link class="hover:text-white" to="#">Контакты</nuxt-link>
						</div>
					</nav>
				</div>
				<div class=" max-w-[282px]">
					<h2 class="text-xl font-extralight tracking-wider">Новости</h2>
					<hr class="w-8 h-px bg-gray-500 my-6">
					<div class="flex space-x-3">
						<a class="btn rounded-md w-12 h-12 bg-gray-800 text-gray-500" href="#" target="_blank" title="Наш facebook">
							<v-icon name="facebook" />
						</a>
						<a class="btn rounded-md w-12 h-12 bg-gray-800 text-gray-500" href="#" target="_blank" title="Наш instagram">
							<v-icon name="instagram" />
						</a>
					</div>
					<p class="text-sm text-gray-400 leading-relaxed tracking-wider mt-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur odio quam laudantium modi inventore eos necessitatibus fugiat.</p>
				</div>
			</div>
		</div>
		<div class="container flex justify-between mt-6 py-10">
			<small class="text-xs text-gray-600 tracking-wider">&copy; Copyright 2021, Deserve</small>
			<ul class="flex space-x-5 text-xs text-gray-600 tracking-wider">
				<li>
					<a class="hover:underline" href="#">Обработка персональных данных</a>
				</li>
				<li>
					<a class="hover:underline" href="#">Политика конфиденциальности</a>
				</li>
				<li>
					<a class="hover:underline" href="#">Пользовательское соглашение</a>
				</li>
				<li>
					<a class="hover:underline" href="#">Интеллектуальные права</a>
				</li>
			</ul>
		</div>
	</footer>
</template>
