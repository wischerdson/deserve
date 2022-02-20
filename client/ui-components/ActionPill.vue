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
		<span class="text-xs tracking-rr uppercase text-white font-extralight">{{ text }}</span>
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
			magnetic: { type: Boolean, required: false, default: true },
			animatePill: { type: Boolean, required: false, default: false },
			animationDelay: { type: Number, required: false, default: 0 },
			text: { required: true },
			pillOutline: { type: Boolean, required: false, default: false }
		},
		methods: {
			animate () {
				const svg = this.$el.querySelector('.ui-action__pill-circle svg')

				setTimeout(() => new Vivus(svg, {
					duration: 60,
					type: 'sync',
					start: 'autostart',
					animTimingFunction: Vivus.EASE,
					onReady: () => this.showCircle = true
				}), this.animationDelay)
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
