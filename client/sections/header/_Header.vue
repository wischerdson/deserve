<template>
	<header class="section-header fixed -top-1 bottom-0 inset-x-0 z-30">
		<div class="h-[88px]" ref="spacer">
			<!-- Desktop menu -->
			<div
				class="z-10 overflow-hidden absolute inset-x-0 top-0 bg-black/30 backdrop-blur-lg backdrop-saturate-150 h-[inherit] lg:hidden"
				ref="backdrop"
			>
				<header-menu-desktop :opened="menu" @close="menu = false" />
			</div>

			<!-- Navigation bar -->
			<header-nav-bar
				v-model="menu"
				@brief-sidebar="briefSidebar = true"
			/>

			<!-- Mobile header backdrop -->
			<div class="absolute inset-x-0 top-0 bg-black/30 backdrop-blur-lg backdrop-saturate-150 h-[inherit] hidden lg:block"></div>

			<!-- Mobile menu button -->
			<div class="absolute inset-0 z-30 h-[inherit] hidden lg:block pointer-events-none">
				<div class="container h-full">
					<div class="h-full">
						<v-action
							class="pointer-events-auto h-full transition-opacity hover:opacity-70"
							@click="menu = !menu"
							left-icon="menu"
						>
							<div class="mt-0.5 relative text-gray-300 uppercase text-[.6rem] tracking-[.25rem] sm:tracking-rr overflow-hidden">
								<span class="font-normal" v-if="!menu">Menu</span>
								<span class="font-normal" v-else>Закрыть</span>
							</div>
						</v-action>
					</div>
				</div>
			</div>

			<!-- Mobile menu -->
			<header-menu-mobile v-model="menu" />
		</div>

		<brief-sidebar :opened="briefSidebar" @close="briefSidebar = false" />
	</header>
</template>

<script>

	import gsap from 'gsap'
	import { ScrollTrigger } from 'gsap/ScrollTrigger'
	import HeaderMenuDesktop from './MenuDesktop'
	import HeaderMenuMobile from './MenuMobile'
	import HeaderNavBar from './NavBar'
	import BriefSidebar from './BriefSidebar'

	/* Register header scroll animation  */
	const initScrollTrigger = function () {
		gsap.registerPlugin(ScrollTrigger)

		const timeline = gsap.timeline()
		timeline.to(this.$refs.spacer, { height: 58 }, '50%')

		ScrollTrigger.create({
			animation: timeline,
			trigger: document.getElementById('header_scroll_marker'),
			start: 'top top',
			end: '100%',
			scrub: true
		})
	}

	export default {
		data () {
			return {
				menu: false,
				briefSidebar: false
			}
		},
		components: { HeaderMenuDesktop, HeaderMenuMobile, HeaderNavBar, BriefSidebar },
		watch: {
			menu (value) {
				const backdrop = this.$refs.backdrop
				this.$refs.backdrop.classList.add('backdrop-extending')
				this.$refs.backdrop.addEventListener('transitionend', () => {
					backdrop.classList.remove('backdrop-extending')
				})

				if (value) {
					this.$refs.backdrop.classList.add('backdrop-extended')
				} else {
					this.$refs.backdrop.classList.remove('backdrop-extended')
				}
			},
			$route () {
				this.menu = false
				this.briefSidebar = false
			}
		},
		mounted () {
			initScrollTrigger.call(this)
			this.briefSidebar = this.$route.hash == '#brief'
		}
	}

</script>

<style lang="scss" scoped>

	.backdrop-blur-lg {
		backdrop-filter: blur(16px);
	}

	.section-header {
		pointer-events: none;

		& > *:not(.pointer-events-none) {
			pointer-events: auto;
		}
	}

	.backdrop-extending {
		transition: height .6s ease, background-color 1s ease;
	}

	.backdrop-extended {
		height: 100%;
		background-color: #000;
	}

</style>
