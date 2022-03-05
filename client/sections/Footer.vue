<template>
	<footer class="pt-28 relative z-10 bg-black">
		<div class="container">
			<div class="flex justify-between lg:block lg:max-w-xs lg:mx-auto">
				<div class="flex">
					<div class="pr-8 max-w-sm w-full lg:pr-0 lg:max-w-none lg:text-center">
						<v-icon width="120px" name="deserve-full-logo" />
						<div class="mt-5">
							<p class="text-sm text-gray-400 leading-relaxed tracking-wider">Добро пожаловать в наш мир. Мы - Deserve, креативное digital-агентство. Мы предлагаем различные виды цифровых услуг.</p>
						</div>
					</div>
					<div class="border-l border-gray-600 pl-12 max-w-[282px] xl:hidden">
						<h2 class="text-xl font-extralight tracking-wider">Контакты</h2>
						<hr class="w-8 h-px bg-gray-500 my-6">
						<p class="text-sm text-gray-400 leading-relaxed tracking-wider">Ваше сообщение будет направлено в отдел по работе с клиентами.</p>
						<div class="mt-6">
							<v-action class="px-10 tracking-wider text-gray-400 border-gray-400 hover:border-white hover:text-white transition-colors rounded-full border h-11" to="/contacts">
								Связаться с нами
							</v-action>
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
							<nuxt-link class="hover:text-white" exact to="/portfolio">Портфолио</nuxt-link>
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
					<div class="flex space-x-5 lg:justify-center lg:mt-10">
						<v-action
							class="text-gray-500"
							href="https://www.facebook.com/deserve.ru"
							target="_blank"
							title="Наш facebook"
							area-label="Наш facebook"
						>
							<v-icon name="facebook" />
						</v-action>
						<v-action
							class="text-gray-500"
							href="https://instagram.com/deserve_ru"
							target="_blank"
							title="Наш Instagram"
							area-label="Наш Instagram"
						>
							<v-icon name="instagram" />
						</v-action>
					</div>
					<p class="text-sm text-gray-400 leading-relaxed tracking-wider mt-6 lg:hidden">Подпишитесь на нас в социальных сетях, чтобы получать новости и эксклюзивные предложения.</p>
				</div>
			</div>
		</div>
		<div class="container flex justify-between mt-6 py-10 lg:flex-col-reverse">
			<small class="text-xs text-gray-600 tracking-wider lg:text-center lg:mt-10">&copy; Copyright 2022, deserve.ru</small>
			<ul class="flex space-x-5 lg:space-x-0 lg:space-y-4 text-xs lg:tracking-widest text-gray-600 tracking-wider lg:block lg:text-center">
				<li>
					<nuxt-link class="hover:underline" exact to="/legal/privacy-policy" rel="nofollow">Политика конфиденциальности</nuxt-link>
				</li>
			</ul>
		</div>
	</footer>
</template>
