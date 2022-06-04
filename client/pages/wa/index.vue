<template>
	<div class="py-16 h-screen flex items-center justify-center">
		<div class="max-w-xs w-full px-4">
			<div>
				<label class="font-normal block text-sm" for="phone">Номер телефона</label>
				<input
					class="border border-gray-300 px-3 py-2.5 rounded-lg focus:border-blue-500 focus:ring ring-blue-500/25 block w-full"
					type="text"
					v-model="phone"
					id="phone"
				>
			</div>
			<div class="mt-4">
				<label class="font-normal block text-sm" for="wa_link">Ссылка</label>
				<input
					class="border border-gray-300 bg-gray-50 px-3 py-2.5 rounded-lg block w-full"
					type="text"
					:value="waLink"
					readonly
					id="wa_link"
				>
			</div>
			<div class="mt-4">
				<button
					class="bg-blue-500 text-white rounded-md px-6 py-2.5 block"
					:class="{
						'bg-blue-500 hover:bg-blue-600 transition-colors': !copied,
						'bg-green-500': copied,
					}"
					@click="copy"
				>
					<span v-if="!copied">Скопировать</span>
					<span v-else>Скопировано</span>
				</button>
			</div>
		</div>
	</div>
</template>

<script>

export default {
	layout: 'survey',
	data () {
		return {
			phone: '',
			copied: false
		}
	},
	computed: {
		waLink () {
			const phone = this.phone.replaceAll(/\D/g, '')
			return phone ? `https://wa.me/${phone}` : ''
		}
	},
	methods: {
		copy () {
			navigator.clipboard.writeText(this.waLink).then(() => {
				this.copied = true
				setTimeout(() => this.copied = false, 1000)
			})
		}
	}
}

</script>
