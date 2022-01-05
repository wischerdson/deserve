<template>
	<div class="pt-24">
		<div class="container">
			<h1 class="text-7xl font-extralight mt-12 tracking-[.5rem] lg:text-4xl lg:tracking-[.25rem]">Вакансии</h1>

			<div class="grid grid-cols-3 gap-x-16 gap-y-28 mt-20">
				<div v-for="i in 5">
					<h2 class="text-4xl tracking-rr font-extralight">Дизайнер Tilda</h2>
					<hr class="h-px mb-6 mt-4 bg-gray-500 w-10">
					<p class="text-gray-400 leading-normal tracking-widest font-extralight">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco.</p>
					<div>
						<a
							class="btn rounded-full mt-7 space-x-5"
							href="https://getpods.ru"
							target="_blank"
							ref="respondBtn"
						>
							<div class="flex items-center justify-center w-12 h-12 rounded-full bg-white text-black" ref="btnPill">
								<v-icon name="chevron-right" />
							</div>
							<span class="text-xs tracking-rr uppercase text-white">Отликнуться на вакансию</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		methods: {
			async fetchSomething() {
				await this.$axios.$post('/order-call.php')
			}
		},
		mounted () {
			this.fetchSomething()
			// this.$magnetic.add({
			// 	element: this.$refs.respondBtn,
			// 	trigger: this.$refs.btnPill,

			// })
		}
	}

</script>
