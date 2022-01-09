<template>
	<section class="min-h-screen flex items-center relative">
		<!-- Background -->
		<div class="page-background" data-vbg="https://youtu.be/lu72YfaDU1o" data-vbg-load-background="false"></div>
		<div class="absolute inset-0 bg-black/90 backdrop-contrast-150"></div>
		<h1 class="hidden">О нас</h1>
		<div class="w-full relative z-10 flex items-center pt-56 pb-44 md:pt-10">
			<div class="container">
				<div class="flex text-8xl lg:text-7xl md:text-6xl sm:text-5xl font-extralight tracking-wider">
					<h2 ref="typed">Hello</h2>
				</div>
				<div class="mt-16 md:mt-10 text-5xl lg:text-4xl md:text-3xl sm:text-2xl leading-normal font-extralight tracking-wider text-gray-400 space-y-16 max-w-4xl">
					<p>Добро пожаловать в наш мир. Мы -
					Deserve, <span class="text-white">креативное digital-агентство.</span>
					Мы предлагаем различные виды
					<span class="text-white">цифровых услуг.</span></p>
					<p>Мы помогаем <span class="text-white">нашим клиентам</span>
						начать, поддерживать и развивать
						свой бизнес.
					</p>
					<p>
						Независимо от того, есть ли у вас срочная задача или вы хотите просто обсудить детали будущего проекта, мы можем помочь.
					</p>
				</div>
			</div>
		</div>
		<div class="absolute inset-x-0 bottom-0 flex justify-center z-10">
			<div class="absolute inset-x-0 bottom-0 -top-20 bg-gradient-to-b from-transparent to-black"></div>
		</div>
	</section>
</template>

<script>

	import Typed from 'typed.js'

	export default {
		mounted () {
			this.$videoBg('.page-background')

			new Typed(this.$refs.typed, {
				strings: ['Hello', 'Здравствуйте', 'Bonjour', 'Hola', 'Guten Tag'],
				typeSpeed: 70,
				backSpeed: 30,
				backDelay: 1250,
				startDelay: 700,
				loop: true,
				fadeOut: true,
			})
		}
	}

</script>
