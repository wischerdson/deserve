<template>
	<component
		class="ui-action"
		:is="component"
		exact
		:to="to"
		:href="href"
		v-bind="$attrs"
		v-on="$listeners"
	>
		<v-icon class="mr-2" v-if="leftIcon" :name="leftIcon" />
		<slot />
		<v-icon class="ml-2" v-if="rightIcon" :name="rightIcon" />
	</component>
</template>

<script>

	export default {
		props: {
			href: { type: String, default: null, required: false },
			to: { type: String, default: null, required: false },
			leftIcon: { type: String, required: false },
			rightIcon: { type: String, required: false },
			magnetic: { required: false, default: false }
		},
		computed: {
			component () {
				return this.href ? 'a' : (this.to ? 'nuxt-link' : 'button')
			}
		},
		mounted () {
			if (this.magnetic) {
				const trigger = this.$el.querySelector('[magnetic-trigger]')

				this.$magnetic.add({
					element: this.$el,
					trigger
				})
			}
		}
	}

</script>
