<template>
	<div ref="container" class="container">
		<!-- Desktop -->
		<div class="grid grid-cols-[1fr,2fr] lg:hidden">
			<div class="relative z-10">
				<div class="absolute left-10 inset-y-0 -right-24 flex items-center">
					<div ref="title">
						<div class="text-gray-500 tracking-rr uppercase text-sm mb-6" v-if="project.subtitle">{{ project.subtitle }}</div>
						<h2 class="font-extralight text-7xl tracking-wider max-w-lg" v-html="project.name"></h2>
						<a
							class="inline-flex items-center bg-white/20 hover:bg-white/25 rounded-lg px-3 py-1.5 mt-3"
							:href="project.instagram.href"
							target="_blank"
							v-if="'instagram' in project"
						>
							<v-icon name="instagram" width="22px" />
							<span class="inline-block ml-3 mt-0.5 tracking-wider">{{ project.instagram.title }}</span>
						</a>
						<hr class="w-32 mt-3 h-px bg-gray-700" v-if="!('instagram' in project)">
						<p class="mt-8 text-gray-400 tracking-widest font-extralight">{{ project.desc }}</p>
						<v-action-pill
							magnetic
							class="mt-7"
							text="Посмотреть работу"
							target="_blank"
							:href="project.url"
						/>
					</div>
				</div>
			</div>
			<div>
				<div ref="image" class="w-full relative after:block after:pt-[65%] will-change-transform">
					<div class="absolute inset-0 rounded-3xl overflow-hidden">
						<img class="w-full h-full object-cover object-center" :src="project.image" :alt="project.name">
					</div>
				</div>
			</div>
		</div>

		<!-- Mobile -->
		<div class="hidden lg:block">
			<div ref="mobileImage" class="w-full relative after:block after:pt-full">
				<div class="absolute inset-0 rounded-3xl overflow-hidden">
					<img class="w-full h-full object-cover object-center" :src="project.mobileImage || project.image" :alt="project.name">
				</div>
			</div>
			<div class="mt-10" ref="mobileTitle">
				<div class="text-6xl font-extralight tracking-wider" v-html="project.name"></div>
				<a
					class="inline-flex items-center bg-white/20 hover:bg-white/25 rounded-lg px-3 py-1.5 mt-3"
					:href="project.instagram.href"
					target="_blank"
					v-if="'instagram' in project"
				>
					<v-icon name="instagram" width="22px" />
					<span class="inline-block ml-3 mt-0.5 tracking-wider">{{ project.instagram.title }}</span>
				</a>
				<hr class="w-32 mt-3 bg-gray-700 h-px" v-if="!('instagram' in project)">
				<p class="mt-4 text-gray-400 tracking-wider font-extralight leading-normal">{{ project.desc }}</p>
				<v-action-pill
					class="mt-7"
					text="Посмотреть работу"
					target="_blank"
					:href="project.url"
				/>
			</div>
		</div>
	</div>
</template>

<script>

import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

const initScrollTrigger = function () {
	gsap.registerPlugin(ScrollTrigger)

	const $container = this.$refs.container
	const $image = this.$refs.image
	const containerImageWitdhsRatio = $container.offsetWidth/$image.offsetWidth

	ScrollTrigger.matchMedia({
		// Desktop animation
		'(min-width: 1024px)': () => {
			const timeline = gsap.timeline()
			timeline.fromTo(
				this.$refs.image,
				{ opacity: 0 },
				{ opacity: 1 },
				0
			).addLabel('start')
			timeline.fromTo(
				this.$refs.image,
				{ filter: 'blur(28px)' },
				{ filter: 'blur(0px)', duration: .225 },
				0
			)
			timeline.fromTo(
				this.$refs.image,
				{ scale: containerImageWitdhsRatio, transformOrigin: 'right center' },
				{ scale: 1 },
				'start-=70%'
			)
			timeline.fromTo(
				this.$refs.title,
				{ opacity: 0, x: -75 },
				{ opacity: 1, x: 0 },
				'start-=70%'
			)

			ScrollTrigger.create({
				animation: timeline,
				trigger: this.$el,
				start: 'center center',
				end: 'bottom top',
				scrub: true,
				pin: true
			})
		},
		// Mobile animation
		'(max-width: 1023px)': () => {
			const timeline = gsap.timeline()
			timeline.fromTo(
				this.$refs.mobileImage,
				{ opacity: 0, scale: .9 },
				{ opacity: 1, scale: 1 },
				0
			).addLabel('start');

			timeline.fromTo(
				this.$refs.mobileTitle,
				{ opacity: 0, y: 50 },
				{ opacity: 1, y: 0 },
				'start-=70%'
			);

			ScrollTrigger.create({
				animation: timeline,
				trigger: this.$el,
				start: 'top center',
				end: '70% center',
				scrub: true
			})
		}
	})
}

export default {
	props: {
		project: Object
	},
	methods: {
		showSidebar () {
			window.openSidebar()
		}
	},
	mounted () {
		initScrollTrigger.call(this)
	}
}

</script>
