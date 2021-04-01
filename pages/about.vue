<template>
	<div id="template_about">
		<section class="red-section">
			<div class="top">
				<h2 class="title">Hello—</h2>
			</div>
			<div class="main-red-content">
				<div class="text-aside">
					<div class="text-rotated">
						Who we are
					</div>
				</div>
				<img class="cute-design-blob" src="@/assets/img/design-blob.svg" alt="">
				<div class="overlay-dotted"></div>
				<div class="container">
					<div class="column">
						<p class="nice-text">
							Добро пожаловать в наш мир. Мы - Deserve, <span class="outline-text">креативное digital агентство.</span> Мы предлагаем различные виды <span class="outline-text">цифровых услуг.</span>
						</p>
						<p class="nice-text">Мы помогаем <span class="outline-text">нашим клиентам</span> начать, поддерживать и развивать свой бизнес.</p>
						<p class="nice-text">Независимо от того, есть ли у вас срочная задача или вы хотите просто обсудить детали будущего проекта, мы можем помочь. <span class="outline-text">А теперь давайте познакомимся поближе.</span></p>
					</div>
				</div>
			</div>
		</section>
		<section class="our-mission">
			<div class="container">
				<div class="row">
					<div class="left">
						<div class="comic-text">We are creating smart websites.</div>
						<div class="row-bold-text">На рынке много агенств с впечатляющими результатами, но Deserve - это особенный путь. Хотите построить что-то, что будет жить вечно? Мы здесь.</div>
					</div>
					<div class="right">
						<img src="@/assets/img/about-05.svg" alt="">
					</div>
				</div>
				<div class="row reverse">
					<div class="left">
						<div class="row-bold-text">Наша миссия и видение</div>
						<p class="plain-text">Также Deserve является креативным маркетинговым агентством, ориентированным на понимание и поведение. Полноценное Digital продвижение, cпециализирующееся на различных этапах рекламного размещения. Мы задействуем такие модули как: медиапланирование, сбор/анализ данных, креативная разработка/адаптация, медиаразмещение с оптимизацией в режиме реального времени, статистический анализ результата.</p>
					</div>
					<div class="right">
						<img src="@/assets/img/about-06.svg" alt="">
					</div>
				</div>
			</div>
		</section>
		<section class="parallax">
			<parallax />
		</section>
	</div>
</template>

<script>

	import Parallax from '@/components/Parallax'

	export default {
		components: {
			Parallax
		}
	}
</script>