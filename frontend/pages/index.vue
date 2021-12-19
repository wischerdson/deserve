<template>
	<div>
		<WelcomeSection />

		<div class="mt-20">
			<div class="container">
				<ul class="grid grid-cols-4 -mx-12 lg:grid-cols-1 lg:gap-7 lg:text-center lg:max-w-xs lg:mx-auto">
					<li class="px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">От идеи до желаемого результата</h2>
						<p class="text-gray-500 text-xs font-normal tracking-widest leading-tight">Выполняем все этапы видеопроизводства</p>
					</li>
					<li class="px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">От идеи до желаемого результата</h2>
						<p class="text-gray-500 text-xs font-normal tracking-widest leading-tight">Выполняем все этапы видеопроизводства</p>
					</li>
					<li class="px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">От идеи до желаемого результата</h2>
						<p class="text-gray-500 text-xs font-normal tracking-widest leading-tight">Выполняем все этапы видеопроизводства</p>
					</li>
					<li class="px-12 space-y-3 lg:space-y-0 lg:px-6">
						<h2 class="text-gray-400 font-normal tracking-wider">От идеи до желаемого результата</h2>
						<p class="text-gray-500 text-xs font-normal tracking-widest leading-tight">Выполняем все этапы видеопроизводства</p>
					</li>
				</ul>
			</div>
		</div>

		<PortfolioSection class="mt-30" />
	</div>
</template>

<script>

	import WelcomeSection from '~/sections/home/Welcome'
	import PortfolioSection from '~/sections/Portfolio'

	export default {
		components: { WelcomeSection, PortfolioSection }
	}

</script>
