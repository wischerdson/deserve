<template>
	<a class="action" v-if="href" :href="href" :target="target" :title="title">
		<div class="flex items-center justify-center w-12 h-12 rounded-full bg-white text-black" v-if="pill" ref="pill">
			<v-icon name="chevron-right" />
		</div>
		<span class="space-x-2"><slot /></span>
	</a>
	<nuxt-link class="action" v-else-if="to" exact :to="to" :title="title">
		<div class="flex items-center justify-center w-12 h-12 rounded-full bg-white text-black" v-if="pill" ref="pill">
			<v-icon name="chevron-right" />
		</div>
		<span class="space-x-2"><slot /></span>
	</nuxt-link>
	<button class="action" v-else :title="title" :type="type">
		<div class="flex items-center justify-center w-12 h-12 rounded-full bg-white text-black" v-if="pill" ref="pill">
			<v-icon name="chevron-right" />
		</div>
		<span class="space-x-2"><slot /></span>
	</button>
</template>

<script>

	export default {
		props: {
			pill: { type: Boolean, default: false },
			magnetic: { type: Boolean, default: false },
			magneticDistance: { type: Number, default: 50 },
			href: { type: String, default: null },
			to: { type: String, default: null },
			target: { type: String, default: '_self' },
			title: { type: String, default: null },
			type: { type: String, default: null }
		}
	}

</script>

<style lang="scss">

	.action {
		@apply inline-flex items-center justify-center select-none transition duration-500 space-x-5;

		&:active {
			opacity: .65;
			transition: none;
		}

		&-outline {
			@apply rounded-full border h-11;
		}
	}

</style>
