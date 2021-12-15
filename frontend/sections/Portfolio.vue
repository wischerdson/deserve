<template>
	<section class="text-white space-y-80">
		<portfolio-project :image="require('~/static/image/project-getpods.png')" />
		<portfolio-project :image="require('~/static/image/project-hostrim.png')" />
		<portfolio-project :image="require('~/static/image/project-timochko.png')" />
	</section>
</template>

<script>

	import PortfolioProject from '~/components/PortfolioProject'

	export default {
		components: { PortfolioProject }
	}

</script>
