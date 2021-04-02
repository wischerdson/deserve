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
			<services-range />
		</section>
		<section class="parallax-section">
			<parallax />
		</section>
	</main>
</template>

<script>
	
	import Parallax from '@/components/Parallax'
	import ServicesRange from '@/components/ServicesRange'

	export default {
		components: {
			Parallax, ServicesRange
		},
		head: {
			title: "Услуги - Deserve",
			description: "Добро пожаловать в наш мир. Мы - Deserve, креативное digital агентство. Мы предлагаем различные виды цифровых услуг."
		}
	}

</script>