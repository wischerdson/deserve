<template>
	<section class="text-white space-y-80">
		<portfolio-project :image="`https://img.tehnomaks.ru/img/prod/full/1553572913_6.png`" />
		<portfolio-project :image="require('~/static/image/sdsds.png')" />
		<portfolio-project :image="require('~/static/image/frrfrfr.png')" />
	</section>
</template>

<script>

	import PortfolioProject from '~/components/PortfolioProject'

	export default {
		components: { PortfolioProject }
	}

</script>
