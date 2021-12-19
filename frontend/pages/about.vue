<template>
	<section class="min-h-screen flex items-center relative">
		<!-- Background -->
		<div class="page-background" data-vbg="https://youtu.be/lu72YfaDU1o" data-vbg-load-background="false"></div>
		<div class="absolute inset-0 bg-black/70 backdrop-contrast-150"></div>
		<div ref="welcome_text" class="absolute inset-0 z-10 flex items-center">
			<div class="container">
				<p class="text-white text-center mb-10 text-xl uppercase tracking-[.5rem] lg:text-base lg:tracking-[.4rem]">Ваш партнер в digital-среде</p>
				<h1 class="text-white text-center font-light text-6xl uppercase tracking-widest lg:text-4xl md:leading-normal">Design. Strategy. Harmony.</h1>
				<div class="text-center">
					<a class="details-action btn mt-10 text-white uppercase tracking-[.3rem] text-xs relative leading-none px-4 py-2" href="#">
						<span>Подробнее</span>
						<v-icon width="14px" class="absolute -right-2 block mb-[3px] pointer-events-none" name="chevron-right" />
					</a>
				</div>
			</div>
		</div>
		<div class="absolute inset-x-0 bottom-0 flex justify-center z-10">
			<div class="absolute inset-x-0 bottom-0 -top-20 bg-gradient-to-b from-transparent to-black"></div>
		</div>
	</section>
</template>

<script>

	export default {
		mounted () {
			this.$videoBg('.page-background')
		}
	}

</script>
