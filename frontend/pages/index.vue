<template>
	<div>
		<WelcomeSection />

		<div class="mt-20">
			<div class="container">
				<ul class="grid grid-cols-4 divide-x divide-white/40 -mx-12">
					<li class="px-12 space-y-3">
						<h2 class="text-gray-400 font-medium tracking-wider">От идеи до желаемого результата</h2>
						<p class="text-gray-500 text-xs font-normal tracking-widest leading-tight">Выполняем все этапы видеопроизводства</p>
					</li>
					<li class="px-12 space-y-3">
						<h2 class="text-gray-400 font-medium tracking-wider">От идеи до желаемого результата</h2>
						<p class="text-gray-500 text-xs font-normal tracking-widest leading-tight">Выполняем все этапы видеопроизводства</p>
					</li>
					<li class="px-12 space-y-3">
						<h2 class="text-gray-400 font-medium tracking-wider">От идеи до желаемого результата</h2>
						<p class="text-gray-500 text-xs font-normal tracking-widest leading-tight">Выполняем все этапы видеопроизводства</p>
					</li>
					<li class="px-12 space-y-3">
						<h2 class="text-gray-400 font-medium tracking-wider">От идеи до желаемого результата</h2>
						<p class="text-gray-500 text-xs font-normal tracking-widest leading-tight">Выполняем все этапы видеопроизводства</p>
					</li>
				</ul>
			</div>
		</div>

		<PortfolioSection class="mt-48" />

		<div class="h-screen"></div>
	</div>
</template>

<script>

	import WelcomeSection from '~/sections/home/Welcome'
	import PortfolioSection from '~/sections/Portfolio'

	export default {
		components: { WelcomeSection, PortfolioSection }
	}

</script>
