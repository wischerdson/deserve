<template>
	<transition :duration="400">
		<div class="sidebar fixed inset-0" v-if="opened">
			<div class="backdrop absolute inset-0 bg-black/75 z-10" @click="$emit('close')"></div>
			<div class="sidebar-content absolute inset-y-0 max-h-full overflow-y-scroll right-0 w-full max-w-lg z-20 bg-black">
				<div class="pb-32 pt-28 px-14">
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
							<select class="text-white bg-unset" name="budget" v-model="budget">
								<option class="text-black" value="1">До 500 тыс.</option>
								<option class="text-black" value="1">0.5 - 1 млн.</option>
								<option class="text-black" value="1">1 - 3 млн.</option>
								<option class="text-black" value="1">От 3 млн.</option>
							</select>
						</fieldset>
						<fieldset>
							<v-input type="textarea" name="message" v-model="form.description">
								<template v-slot:label>Опишите задачу, которую хотите решить</template>
							</v-input>
						</fieldset>
						<fieldset>
							<v-input type="file" name="file" v-model="form.file">
								<template v-slot:label>Прикрепить файл (PDF, DOCX)</template>
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

				}
			}
		}
	}

</script>

<style lang="scss" scoped>

	.sidebar {
		&.v-enter-active, &.v-leave-active {
			.backdrop {
				transition: opacity .4s ease;
			}

			.sidebar-content {
				transition: transform .4s ease;
			}
		}

		&.v-enter, &.v-leave-to {
			.backdrop {
				opacity: 0;
			}

			.sidebar-content {
				transform: translateX(100%);
			}
		}
	}

</style>
