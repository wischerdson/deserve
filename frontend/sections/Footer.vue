<template>
	<footer class="mt-28 text-white">
		<div class="container grid grid-cols-[auto,1fr]">
			<div>
				<a href="/">
					<v-icon name="deserve-full-logo" />
				</a>
				<ul class="flex space-x-6 mt-8">
					<li>
						<a href="" target="_blank">
							<v-icon name="instagram" />
						</a>
					</li>
					<li>
						<a href="" target="_blank">
							<v-icon name="facebook" />
						</a>
					</li>
				</ul>
				<div class="mt-10">
					<p class="text-gray-500 tracking-widest text-sm leading-normal">Аренда премиальных автомобилей <br>по Москве и Московской области</p>
				</div>
			</div>
			<div class="ml-52">
				<nav class="space-x-10 font-normal">
					<a class="hover:opacity-50 transition-opacity tracking-widest text-sm py-2.5" href="#">Главная</a>
					<a class="hover:opacity-50 transition-opacity tracking-widest text-sm py-2.5" href="#">Об агентстве</a>
					<a class="hover:opacity-50 transition-opacity tracking-widest text-sm py-2.5" href="#">Порфолио</a>
					<a class="hover:opacity-50 transition-opacity tracking-widest text-sm py-2.5" href="#">Вакансии</a>
					<a class="hover:opacity-50 transition-opacity tracking-widest text-sm py-2.5" href="#">Контакты</a>
				</nav>
				<div class="flex justify-between mt-11 text-sm">
					<div>
						<h4 class="text-sm font-normal tracking-wider">Для связи с нами</h4>
						<ul class="flex space-x-6 mt-7">
							<li>
								<a class="btn w-10 h-10 rounded-full border" href="#" target="_blank" title="Связаться с нами через Telegram">
									<v-icon width="18px" name="telegram" />
								</a>
							</li>
							<li>
								<a class="btn w-10 h-10 rounded-full border" href="#" target="_blank" title="Связаться с нами по Whatsapp">
									<v-icon width="18px" name="whatsapp" />
								</a>
							</li>
						</ul>
					</div>
					<div>
						<h4 class="text-sm font-normal tracking-wider">Адрес</h4>
						<address class="text-gray-500 text-sm mt-6 leading-normal tracking-wider">
							<p>г. Смоленск, <br>улица Ленина, 13Б, <br>214000</p>
						</address>
					</div>
					<div>
						<h4 class="text-sm font-normal tracking-wider">Реквизиты</h4>
						<div class="text-gray-500 text-sm mt-6 leading-normal tracking-wider">
							<p>ООО "Дезерв" <br>ИНН 1234567890 <br>КПП 1234567890987</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container flex justify-between my-10">
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
