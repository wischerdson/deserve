<template>
	<footer class="mt-28">
		<div class="container">
			<div class="flex justify-between lg:block lg:max-w-xs lg:mx-auto">
				<div class="flex">
					<div class="pr-8 max-w-sm w-full lg:pr-0 lg:max-w-none lg:text-center">
						<v-icon width="120px" name="deserve-full-logo" />
						<div class="mt-5">
							<p class="text-sm text-gray-400 leading-relaxed tracking-wider">Use this tool as test data for an automated system or find your next pen.</p>
						</div>
					</div>
					<div class="border-l border-gray-600 pl-12 max-w-[282px] xl:hidden">
						<h2 class="text-xl font-extralight tracking-wider">О компании</h2>
						<hr class="w-8 h-px bg-gray-500 my-6">
						<p class="text-sm text-gray-400 leading-relaxed tracking-wider">But horizontal lines can only be full pixel high</p>
						<div class="mt-8">
							<nuxt-link class="btn btn-outline px-10 tracking-wider text-gray-400 border-gray-400 hover:border-white hover:text-white transition-colors" to="#">More info</nuxt-link>
						</div>
						<div class="mt-6">
							<nuxt-link class="btn btn-outline px-10 tracking-wider text-gray-400 border-gray-400 hover:border-white hover:text-white transition-colors" exact to="/contacts">Contact us</nuxt-link>
						</div>
					</div>
				</div>
				<div>
					<h2 class="text-xl font-extralight tracking-wider lg:hidden">Навигация</h2>
					<hr class="w-8 h-px bg-gray-500 my-6 lg:mx-auto">
					<nav class="space-y-5 text-gray-400 text-sm tracking-wider lg:text-center">
						<div>
							<nuxt-link class="hover:text-white" exact to="/">Главная</nuxt-link>
						</div>
						<div>
							<nuxt-link class="hover:text-white" exact to="/about">Об агентстве</nuxt-link>
						</div>
						<div>
							<nuxt-link class="hover:text-white" exact to="#">Портфолио</nuxt-link>
						</div>
						<div>
							<nuxt-link class="hover:text-white" exact to="/vacancies">Вакансии</nuxt-link>
						</div>
						<div>
							<nuxt-link class="hover:text-white" exact to="/contacts">Контакты</nuxt-link>
						</div>
					</nav>
				</div>
				<div class="max-w-[282px] lg:max-w-none">
					<h2 class="text-xl font-extralight tracking-wider lg:hidden">Новости</h2>
					<hr class="w-8 h-px bg-gray-500 my-6 lg:hidden">
					<div class="flex space-x-3 lg:justify-center lg:mt-10">
						<a class="btn rounded-md w-12 h-12 bg-gray-800 text-gray-500" href="#" target="_blank" title="Наш facebook">
							<v-icon name="facebook" />
						</a>
						<a class="btn rounded-md w-12 h-12 bg-gray-800 text-gray-500" href="#" target="_blank" title="Наш instagram">
							<v-icon name="instagram" />
						</a>
					</div>
					<p class="text-sm text-gray-400 leading-relaxed tracking-wider mt-6 lg:hidden">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur odio quam laudantium modi inventore eos necessitatibus fugiat.</p>
				</div>
			</div>
		</div>
		<div class="container flex justify-between mt-6 py-10 lg:flex-col-reverse">
			<small class="text-xs text-gray-600 tracking-wider lg:text-center lg:mt-10">&copy; Copyright 2022, Deserve</small>
			<ul class="flex space-x-5 lg:space-x-0 lg:space-y-4 text-xs lg:tracking-widest text-gray-600 tracking-wider lg:block lg:text-center">
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
