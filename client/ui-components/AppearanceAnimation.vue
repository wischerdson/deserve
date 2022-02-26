<template>
	<transition name="appearance" :duration="{ enter: durEnter, leave: 1 }">
		<div :class="`effect-${effect}`" v-show="show">
			<slot />
		</div>
	</transition>
</template>

<script>

	export default {
		props: {
			animate: { type: Boolean, default: true },
			eachDelay: { type: Number, default: 100 },
			effect: { type: String }
		},
		data () {
			return {
				durEnter: 10000,
				show: false
			}
		},
		watch: {
			animate (value) {
				if (value) this.run()
				else this.show = false
			}
		},
		methods: {
			run () {
				const MAX_DUR = 1000
				const elements = this.$el.querySelectorAll('*[appearance-animation-target]')

				this.durEnter = elements.length * this.eachDelay + MAX_DUR

				elements.forEach((item, idx) => {
					item.style.transitionDelay = idx * this.eachDelay + 'ms'

					const inputUnderline = item.querySelector('.ui-base-input__underline')
					if (inputUnderline) {
						inputUnderline.style.transitionDelay = (idx + 1.5) * 1.1 * this.eachDelay + 'ms'
					}
				})

				this.show = true
			}
		},
		mounted () {
			if (this.animate) this.run()
		}
	}

</script>

<style lang="scss">

	.appearance {
		&-enter-active {
			*[appearance-animation-target] {
				transition: transform .7s ease, opacity .7s ease;

				.ui-base-input__underline {
					transition: transform 1s ease;
					transform-origin: 0;
				}
			}
		}

		&-enter {
			*[appearance-animation-target] {
				opacity: 0;

				.ui-base-input__underline {
					transform: scaleX(0);
				}
			}

			&.effect-from-t-to-b *[appearance-animation-target] {
				transform: translateY(-30px);
			}

			&.effect-from-b-to-t *[appearance-animation-target] {
				transform: translateY(30px);
			}
		}
	}

</style>
