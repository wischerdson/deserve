<template>
	<div class="header__menu-desktop h-screen flex items-center relative">
		<div class="container">
			<div class="grid grid-cols-2">
				<ul class="mx-auto text-3xl space-y-12 font-thin tracking-[.45rem] leading-none uppercase">
					<li class="menu-item">
						<nuxt-link class="btn menu-item__link inline-block" exact to="/">Главная</nuxt-link>
					</li>
					<li class="menu-item">
						<nuxt-link class="btn menu-item__link inline-block" exact to="/about">Об агентстве</nuxt-link>
					</li>
					<li class="menu-item">
						<nuxt-link class="btn menu-item__link inline-block" exact to="/portfolio">Портфолио</nuxt-link>
					</li>
					<li class="menu-item">
						<nuxt-link class="btn menu-item__link inline-block" exact to="/vacancies">Вакансии</nuxt-link>
					</li>
					<li class="menu-item">
						<nuxt-link class="btn menu-item__link inline-block" exact to="/contacts">Контакты</nuxt-link>
					</li>
				</ul>
				<div class="form-column mx-auto">
					<h2 class="uppercase text-2xl font-thin tracking-[.25rem]">Обратный звонок</h2>
					<p class="mt-6 text-gray-400 tracking-widest text-sm font-extralight leading-normal">Заполните форму ниже и мы обязательно свяжемся <br> с вами в ближайшее время.</p>

					<form class="mt-6 space-y-4" action="#" @submit.prevent="orderCall">
						<div>
							<v-input type="text" name="name" v-model="orderCallForm.name">
								<template v-slot:label>Как к Вам обращаться?</template>
							</v-input>
						</div>
						<div>
							<v-input type="phone" name="phone" v-model="orderCallForm.phone">
								<template v-slot:label>Ваш номер телефона</template>
							</v-input>
						</div>
						<div class="pt-8">
							<button class="btn space-x-4" type="submit" ref="submitFormBtn">
								<div class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-400 text-gray-400" ref="submitFormBtnPill">
									<v-icon name="chevron-right" />
								</div>
								<span class="text-xs tracking-rr uppercase text-white font-extralight">Отправить</span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="menu-bottom absolute inset-x-0 bottom-10">
			<div class="container flex items-center">
				<div>
					<a class="text-gray-400 hover:text-white transition-colors" href="https://instagram.com" target="_blank" title="Наш Instagram">
						<v-icon name="instagram" />
					</a>
				</div>
				<div class="ml-auto flex items-center space-x-10">
					<a class="text-gray-500 text-xs tracking-widest" href="#">Политика конфиденциальности</a>
					<p class="uppercase tracking-rr text-xs">Made by Deserve</p>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		props: {
			opened: Boolean
		},
		data () {
			return {
				magneticSubmitFormBtn: null,
				orderCallForm: {
					phone: '',
					name: ''
				}
			}
		},
		watch: {
			opened () {
				this.magneticSubmitFormBtn.refresh()
			},
			'orderCallForm.phone' (value) {
				console.log(value)
			}
		},
		methods: {
			orderCall () {
				this.$axios.$post('/order-call.php', this.orderCallForm).then((d) => {
					console.log(d)
				})
			}
		},
		mounted () {
			this.magneticSubmitFormBtn = this.$magnetic.add({
				element: this.$refs.submitFormBtn,
				trigger: this.$refs.submitFormBtnPill
			})
		}
	}

</script>

<style lang="scss" scoped>

	.menu {
		will-change: transform, opacity;

		.menu-item {
			will-change: transform, opacity;
		}
		.menu-bottom {
			will-change: opacity;
		}
	}

	.menu-enter-active {
		transition: opacity .6s ease .1s;

		.menu-item {
			transition: transform .3s ease-out, opacity .5s ease;

			@for $i from 1 through 5 {
				&:nth-child(#{$i}) {
					transition-delay: #{$i * .075}s;
				}
			}
		}
		.form-column {
			transition: transform .6s ease-out .2s, opacity .6s ease .2s;
		}
		.menu-bottom {
			transition: opacity .3s ease .5s;
		}
	}

	.menu-enter {
		.menu-item {
			transform: translate3d(0, -20px, 0);
			opacity: 0;
		}
		.form-column {
			transform: scale(.95);
			opacity: 0;
		}
		.menu-bottom {
			opacity: 0;
		}
	}

	.header__menu-desktop .menu-item__link {
		position: relative;

		&:before {
			content: "";
			opacity: 0;
			transition: opacity .2s ease;
			position: absolute;
			left: -30px;
			display: block;
			width: 7px;
			height: 7px;
			background-color: #202020;
			top: calc(50% - 3px);
			transform: translateY(-50%);
			border-radius: 99px;
		}

		&.nuxt-link-exact-active {
			&:before {
				opacity: 1;
			}
		}
	}

</style>
