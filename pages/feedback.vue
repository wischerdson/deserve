
<template>
	<div id="template_contactForm">
		<div class="section-header container">
			<div class="section-title">Связаться с нами</div>
			<p class="desc">Свяжитесь с нами, чтобы узнать, как мы можем помочь вам с вашим проектом.</p>
		</div>
		<div class="container">
			<form @submit.prevent="sendForm" action="https://formsubmit.co/leads@deserve.ru" method="POST" class="contact-form" enctype="multipart/form-data">
				<input type="hidden" name="_captcha" value="false">
				<div class="row">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Имя" name="Name">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Название компании" name="Company">
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Ваш телефон" name="Phone">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Ваш e-mail" name="Email">
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<textarea name="" id="" class="form-control" placeholder="У вас есть вопрос, проект? Вы хотели бы обсудить..." name="Message"></textarea>
					</div>
				</div>
				<div class="row">
					<button type="submit" class="btn btn-red btn-line">Отправить</button>
				</div>
			</form>
		</div>
		<div class="success-popup" v-if="successModal">
			<div class="backdrop" @click="successModal = false"></div>
			<div class="popup-body">
				<div class="icon" v-html="require('@/assets/icons/check-solid.svg?raw')"></div>
				<div class="popup-title">Успешно</div>
				<p>Мы получили Вашу заявку и ответим <br>в ближайшее время</p>
				<button class="btn btn-green" @click="successModal = false">Ok</button>
			</div>
		</div>
	</div>
</template>

<script>
	
	export default {
		data () {
			return {
				successModal: false
			}
		},
		methods: {
			sendForm (e) {
				const form = e.target
				const url = form.attributes.action.value
				const formData = new FormData(form)

				this.$axios.post(url, formData).then(({data}) => {
					this.successModal = true
				}).catch((e) => {
					alert('Error occured')
				})
			}
		},
		head () {
			return {
				title: this.$t('pages.feedback.title'),
				meta: [
					{ property: 'og:title', content: this.$t('pages.feedback.title'), hid: 'og-title' },
				]
			}
		}
	}

</script>
