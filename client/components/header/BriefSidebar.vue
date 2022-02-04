<template>
	<transition :duration="400">
		<div class="contact-us-sidebar fixed inset-0 z-40" v-show="opened">
			<div class="fixed inset-0 bg-black z-10">
				<div class="relative h-full w-1/2 overflow-hidden" @click="$emit('close')">
					<div data-ratio="0.5629" class="absolute -top-14 -bottom-14 left-0" ref="videoWrapper">
						<!-- <div class="bg-black/50 z-10 absolute inset-0"></div> -->
						<iframe class="w-full h-full" src="https://www.youtube.com/embed/n3WfWuq2X_4?controls=0&playlist=n3WfWuq2X_4&autoplay=1&mute=1&playsinline=1&loop=1&modestbranding=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
				<div class="absolute inset-y-0 right-0 flex flex-col items-center justify-between py-8">
					<div class="separator w-px bg-gray-600 absolute inset-y-0 left-0 origin-bottom"></div>
					<div class="px-10">
						<button class="btn text-gray-600 transition-colors hover:text-gray-200" @click="$emit('close')" aria-label="Закрыть" title="Закрыть">
							<v-icon width="36px" name="close" />
						</button>
					</div>
					<div class="uppercase vertical-text font-normal tracking-rr text-gray-400">Deserve</div>
				</div>
			</div>

			<div class="absolute inset-0 overflow-y-scroll">
				<div class="relative z-20 container flex justify-end">
					<div class="pb-32 pt-28 max-w-sm">
						<h2 class="text-4xl font-extralight tracking-rr">Оставьте заявку</h2>
						<p class="text-gray-500 leading-normal font-extralight tracking-wider mt-3">Расскажите о своем проекте и мы с удовольствием включимся в него на любом этапе.</p>
						<form class="mt-6 space-y-6" action="/api/order-call" @submit.prevent="orderCall">
							<fieldset>
								<v-input type="text" name="name" v-model="form.name">
									<template v-slot:label>Как к Вам обращаться?</template>
								</v-input>
							</fieldset>
							<fieldset>
								<v-input type="phone" name="phone" v-model="form.phone">
									<template v-slot:label>Ваш номер телефона</template>
								</v-input>
							</fieldset>
							<fieldset>
								<v-input type="email" name="email" v-model="form.email">
									<template v-slot:label>Ваш email</template>
								</v-input>
							</fieldset>
							<fieldset>
								<v-select name="budget" v-model="form.budget">
									<template #label>Планируемый бюджет</template>
									<option class="text-black" value="" selected></option>
									<option class="text-black" value="1">До 500 тыс.</option>
									<option class="text-black" value="2">0.5 - 1 млн.</option>
									<option class="text-black" value="3">1 - 3 млн.</option>
									<option class="text-black" value="4">От 3 млн.</option>
								</v-select>
							</fieldset>
							<fieldset>
								<v-input type="textarea" name="message" v-model="form.task_description">
									<template v-slot:label>Опишите задачу, которую хотите решить</template>
								</v-input>
							</fieldset>
							<fieldset class="pt-8">
								<button class="btn space-x-4" type="submit" ref="submitFormBtn">
									<div class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-400 text-gray-400" ref="submitFormBtnPill">
										<v-icon name="chevron-right" />
									</div>
									<span class="text-xs tracking-rr uppercase text-white font-extralight">Отправить</span>
								</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</transition>
</template>

<script>

	export default {
		props: {
			opened: Boolean
		},
		data () {
			return {
				form: {
					budget: '',
				}
			}
		},
		mounted () {
			window.addEventListener('resize', () => {
				const video = this.$refs.videoWrapper
				const rightPos = video.dataset.ratio*video.clientHeight
				video.style.right = `-${rightPos}px`
			})
		}
	}

</script>

<style lang="scss" scoped>

	.contact-us-sidebar {
		&.v-enter-active, &.v-leave-active {
			transition: opacity .4s ease;

			.separator {
				transition: transform .9s ease;
			}
		}

		&.v-enter, &.v-leave-to {
			opacity: 0;
		}

		&.v-enter {
			.separator {
				transform: scaleY(0);
			}
		}
	}

</style>
