<template>
	<main id="template_services">


		<section class="section-welcome">
			<div class="container">
				<div class="text">
					<h1 class="title color-red">Мы создаем реальную ценность для вашего бизнеса.</h1>
					<p class="plain-text">Deserve - инновационное digital агентство, предлагающее комплексные услуги веб-разработки, SMO-услуги, SEO-стратегии и различные другие виды услуг, связанных с интернет-маркетингом.</p>
					<nuxt-link to="/about" class="btn btn-light btn-line">{{ $t('home.welcome.learn-more') }}</nuxt-link>
				</div>
			</div>
			<img src="@/static/img/services-01.svg" alt="" class="decorative">
		</section>
		<section class="lets-create-what-people-want">
			<div class="container">
				<div class="grey-block">
					<div class="row">
						<h4 class="block-title">Deserve предоставляет полноценный спектр услуг для вашего бизнеса.</h4>
						<div class="list-column">
							<ul>
								<li class="item"><div class="tick" v-html="require('@/assets/icons/done.svg?raw')"></div> Back-end разработка</li>
								<li class="item"><div class="tick" v-html="require('@/assets/icons/done.svg?raw')"></div>Front-end разработка</li>
								<li class="item"><div class="tick" v-html="require('@/assets/icons/done.svg?raw')"></div>Web разработка</li>
								<li class="item"><div class="tick" v-html="require('@/assets/icons/done.svg?raw')"></div>Web design</li>
								<li class="item"><div class="tick" v-html="require('@/assets/icons/done.svg?raw')"></div>E-commerce</li>
								<li class="item"><div class="tick" v-html="require('@/assets/icons/done.svg?raw')"></div>Чат-боты</li>
							</ul>
						</div>
						<div class="list-column">
							<ul>
								<li class="item"><div class="tick" v-html="require('@/assets/icons/done.svg?raw')"></div>Контекстная реклама</li>
								<li class="item"><div class="tick" v-html="require('@/assets/icons/done.svg?raw')"></div>Таргетированная реклама</li>
								<li class="item"><div class="tick" v-html="require('@/assets/icons/done.svg?raw')"></div>Influencer-маркетинг</li>
								<li class="item"><div class="tick" v-html="require('@/assets/icons/done.svg?raw')"></div>SEO оптимизация</li>
								<li class="item"><div class="tick" v-html="require('@/assets/icons/done.svg?raw')"></div>Email-маркетинг</li>
								<li class="item"><div class="tick" v-html="require('@/assets/icons/done.svg?raw')"></div>Бренд-платформы</li>
							</ul>
						</div>
					</div>
					<img class="decorative-hedgehog" src="@/static/img/decorative-hedgehog.svg" alt="">
				</div>
			</div>
		</section>
		<section class="parallax-section">
			<parallax />
		</section>
	</main>
</template>

<script>
	
	import Parallax from '@/components/Parallax'

	export default {
		components: {
			Parallax
		},
		head: {
			title: "Услуги - Deserve",
			description: "Добро пожаловать в наш мир. Мы - Deserve, креативное digital агентство. Мы предлагаем различные виды цифровых услуг."
		}
	}

</script>