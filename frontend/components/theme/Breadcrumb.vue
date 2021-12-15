<template>
	<nav>
		<ul class="flex">
			<li class="text-sm flex items-center tracking-wider" v-for="(link, idx) in chain" :key="`bc-item-${idx}`">
				<nuxt-link class="hover:underline text-gray-400" :to="link.href" v-if="idx != lastIdx">{{ link.name }}</nuxt-link>
				<span class="text-white" v-else>{{ link.name }}</span>
				<span class="block mx-2 text-gray-400" v-if="idx != lastIdx">/</span>
			</li>
		</ul>
	</nav>
</template>

<script>
	export default {
		props: {
			chain: Array
		},
		computed: {
			lastIdx () {
				return this.chain.length - 1
			}
		}
	}
</script>
