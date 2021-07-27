<template>
	<div class="fixed inset-0 z-200 flex justify-center items-center">
		<div class="fixed inset-0 bg-black/50 z-10"></div>
		<div class="rounded-xl bg-white z-20 relative max-w-5xl w-full px-10 py-4 overflow-hidden" :class="{
			'transition-all duration-500': height.transition,
			'absolute opacity-0 pointer-events-none': height.fakeEnabled
		}" :style="{ 'height': height.value || 'auto' }" ref="popup">
			<div class="mb-9">
				<p class="text-gray-500">Пройдите тест и получите расчет стоимости сайта</p>
				<button class="absolute w-10 h-10 top-0 right-0 flex justify-center items-center" title="Закрыть">
					<div class="w-4 text-gray-600" v-html="require('@/assets/icons/close.svg?raw')"></div>
				</button>
			</div>

			<slot />

			<div class="pb-6">
				<div class="mt-12 w-full h-3 rounded-full overflow-hidden bg-gray-200 relative">
					<div class="absolute inset-y-0 left-0 bg-primary transition-all duration-700" :style="`width: ${100*(step - 1)/steps}%`"></div>
				</div>
				<div class="mt-10 flex justify-between items-center">
					<button class="text-xl bg-gray-200 text-gray-800 px-8 py-3 rounded-lg" @click="step--">Назад</button>
					<p class="text-lg text-gray-500">{{ step }}/{{ steps }}</p>
					<button class="text-xl bg-primary text-white px-8 py-3 rounded-lg" @click="step++">Далее</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	
	export default {
		props: {
			opened: {
				type: Boolean,
				default: true
			}
		},
		data: () => ({
			step: 1,
			steps: null,
			
			height: {
				old: null,
				new: null,
				value: null,
				transition: false
			}
		}),
		watch: {
			step (value) {
				this.step = value > 0 ? value : 1
				setTimeout(this.computeHeight, 1)
			},
			'height.fakeEnabled' (value) {
				if (value) {
					this.$refs.fakePopup.innerHTML = this.$refs.popup.innerHTML
				}
			}
		},
		methods: {
			computeHeight () {
				this.height.new = this.$refs.popup.offsetHeight
				this.height.value = `${this.height.old}px`

				setTimeout(this.enableHeightTransition, 1)
			},
			enableHeightTransition () {
				this.height.transition = true
				this.height.value = `${this.height.new}px`

				setTimeout(() => {
					this.height.transition = false
					this.height.old = this.height.new
					this.height.value = null
				}, 500)
			}
		},
		mounted () {
			this.steps = this.$slots.default.reduce(((sum, item) => sum + (item.tag ? 1 : 0)), 0)



			this.height.old = this.$refs.popup.offsetHeight
			this.height.new = this.$refs.popup.offsetHeight
		}
	}

</script>