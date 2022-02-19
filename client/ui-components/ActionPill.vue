<template>
	<v-action v-bind="$attrs" v-on="$listeners" :magnetic="magnetic">
		<div
			class="ui-action__pill relative"
			:class="{ outline: pillOutline }"
			:magnetic-trigger="!!magnetic"
		>
			<div
				class="ui-action__pill-circle"
				v-html="require(`!!raw-loader!~/assets/svg/stroked/circle.svg`).default"
				v-show="showCircle"
			></div>

			<v-icon name="chevron-right" />
		</div>
		<span class="text-xs tracking-rr uppercase text-white">{{ text }}</span>
	</v-action>
</template>

<script>

	import Vivus from 'vivus'

	export default {
		data () {
			return {
				showCircle: !this.animatePill
			}
		},
		props: {
			magnetic: { required: false, default: true },
			animatePill: { required: false, default: false },
			text: { required: true },
			pillOutline: { required: false, default: false }
		},
		methods: {
			animate () {
				const svg = this.$el.querySelector('.ui-action__pill-circle svg')

				new Vivus(svg, {
					duration: 80,
					type: 'sync',
					start: 'autostart',
					animTimingFunction: Vivus.EASE,
					onReady: () => this.showCircle = true
				})
			}
		},
		watch: {
			animatePill (value) {
				if (value) this.animate()
			}
		},
		mounted () {
			if (this.animatePill) this.animate()
		}
	}

</script>
