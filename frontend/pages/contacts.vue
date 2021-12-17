<template>
	<div class="min-h-screen pt-24">
		<div class="container grid grid-cols-[1fr,auto] gap-8">
			<!-- Left column -->
			<div>
				<!-- Page head -->
				<div class="mt-2">
					<v-breadcrumb :chain="[
						{ name: 'Главная', href: '/' },
						{ name: 'Контакты' }
					]" />
					<h1 class="text-7xl font-extralight mt-12  tracking-[.5rem]">Связаться с нами</h1>
				</div>

				<div class="grid grid-cols-2 mt-14">
					<div class="relative pr-24">
						<h2 class="flex items-center space-x-3 text-md tracking-wider">
							<span>Форма обратной связи</span>
							<v-icon name="arrow-right" />
						</h2>
						<p class="text-gray-500 mt-4 leading-normal tracking-wider text-sm">Мы искренне благодарны вам за вопросы, отзывы и предложения. Ваше сообщение будет направлено в отдел по работе с клиентами. Мы обязательно ответим вам в самое ближайшее время.</p>
						<div class="absolute bottom-0 left-0">
							<div class="text-xs text-gray-500 tracking-wider">Присоединяйтесь</div>
							<ul class="flex space-x-3 mt-3">
								<li>
									<a class="text-gray-300" href="" target="_blank">
										<v-icon width="18px" name="instagram" />
									</a>
								</li>
								<li>
									<a class="text-gray-300" href="" target="_blank">
										<v-icon width="18px" name="facebook" />
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div>
						<form action="">
							<div class="space-y-6">
								<v-input type="text" name="name">
									<template v-slot:label><span class="uppercase">Имя</span></template>
								</v-input>
								<v-input type="email" name="email">
									<template v-slot:label><span class="uppercase">E-mail</span></template>
								</v-input>
								<v-input type="tel" name="phone">
									<template v-slot:label><span class="uppercase">Телефон</span></template>
								</v-input>
								<v-input type="textarea" name="message">
									<template v-slot:label><span class="uppercase">Сообщение</span></template>
								</v-input>
							</div>
							<button class="btn mt-10" type="submit">Отправить</button>
						</form>
					</div>
				</div>
				<div class="grid grid-cols-2 mt-24">
					<div>
						<h2 class="font-extralight text-3xl text-gray-400 tracking-widest">Где мы находимся?</h2>
						<p class="mt-12 font-normal">Москва</p>
						<p class="leading-normal text-gray-300 mt-3">Кутузовский проспект, д 2/1, строение 6, <br> Конгресс парк, гост Украина <br>Этаж 3</p>
					</div>
					<div>
						<div class="pt-3/5 relative">
							<div class="absolute inset-0 rounded-lg" :style="`background-image: url('https://scontent-frx5-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/267325346_1276618759521958_8848469307473974010_n.jpg?_nc_ht=scontent-frx5-1.cdninstagram.com&_nc_cat=110&_nc_ohc=3Rp7f2_q1IUAX_epBpO&edm=AABBvjUBAAAA&ccb=7-4&oh=00_AT9lWPgFH-1rWgU74hpqAMwz--zq64nrMbsvOdPBx4ZIng&oe=61C05F78&_nc_sid=83d603`"></div>
						</div>

					</div>
				</div>
			</div>

			<!-- Right column -->
			<div class="pl-3 relative tracking-wider">
				<div class="absolute h-full min-h-screen w-0.5 bg-gray-800 left-0 -top-1.5"></div>
				<div class="sticky top-28 mt-14 space-y-14">
					<div>
						<h2 class="mb-2.5 font-normal relative">
							<span>Контакты</span>
							<span class="absolute inset-y-0 -left-3 bg-white w-0.5"></span>
						</h2>
						<div class="text-gray-500">
							<a class="hover:underline" href="mailto:info@deserve.ru">info@deserve.ru</a>
						</div>
						<div class="text-gray-500 mt-1.5">
							<a class="hover:underline" href="tel:+71234567890">+7 123 456 78 90</a>
						</div>
					</div>
					<div>
						<h2 class="mb-2.5 font-normal relative">
							<span>Часы работы</span>
							<span class="absolute inset-y-0 -left-3 bg-white w-0.5"></span>
						</h2>
						<p class="text-gray-500 leading-normal">Без выходных <br>09:00 - 19:00</p>
					</div>
					<div class="pr-44">
						<h2 class="mb-4 font-normal relative">
							<span>Мы в мессенджерах</span>
							<span class="absolute inset-y-0 -left-3 bg-white w-0.5"></span>
						</h2>
						<ul class="flex space-x-5">
							<li>
								<a class="tg-link btn w-10 h-10 rounded-full bg-telegram" href="#" target="_blank" title="Связаться с нами через Telegram">
									<v-icon width="20px" name="telegram" />
								</a>
							</li>
							<li>
								<a class="wa-link btn w-10 h-10 rounded-full bg-whatsapp" href="#" target="_blank" title="Связаться с нами по WhatsApp">
									<v-icon width="20px" name="whatsapp" />
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style lang="scss" scoped>

	.tg-link {
		box-shadow: 0 0 20px 0 theme('colors.telegram');
	}
	.wa-link {
		box-shadow: 0 0 20px 0 theme('colors.whatsapp');
	}

</style>
