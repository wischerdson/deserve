<template>
	<footer id="section_footer">
		<div class="top">
			<div class="container">
				<div class="columns">
					<div class="column">
						<div class="logo">
							<img src="@/static/img/logo-deserve-white-dot.svg" alt="Deserve logo">
						</div>
						<p class="short-about-company">{{ $t('footer.short-about-us') }}</p>
						<div class="social-media">
							<span class="label">{{ $t('footer.follow-on') }}:</span>
							<a href="#">Fb</a>
							<a href="#">Tw</a>
							<a href="#">Be</a>
						</div>
					</div>
					<div class="column">
						<div class="column-title">{{ $t('footer.our-offices') }}</div>
						<div class="office-address">
							<p class="short-addr">{{ $t('offices.title') }}</p>
							<p class="full-addr">{{ $t('offices.address') }} <br>{{ $t('offices.call') }}</p>
						</div>
					</div>
					<div class="column">
						<div class="column-title">{{ $t('footer.navigation') }}</div>
						<ul class="link-list">
							<div class="links-column">
								<li class="link-item">
									<nuxt-link :to="localePath('/')">
										{{ $t('navigation-links.home') }}
									</nuxt-link>
								</li>
								<li class="link-item">
									<nuxt-link :to="localePath('/about')">
										{{ $t('navigation-links.about-agency') }}
									</nuxt-link>
								</li>
								<li class="link-item">
									<nuxt-link :to="localePath('/services')">
										{{ $t('navigation-links.services') }}
									</nuxt-link>
								</li>
							</div>
							<div class="links-column">
								<li class="link-item">
									<nuxt-link :to="localePath('/portfolio')">
										{{ $t('navigation-links.our-cases') }}
									</nuxt-link>
								</li>
								<li class="link-item">
									<nuxt-link :to="localePath('/vacancies')">
										{{ $t('navigation-links.open-jobs') }}
									</nuxt-link>
								</li>
								<li class="link-item">
									<nuxt-link :to="localePath('/contacts')">
										{{ $t('navigation-links.contacts') }}
									</nuxt-link>
								</li>
							</div>
						</ul>
					</div>
					<div class="column">
						<div class="column-title">{{ $t('footer.newsletter.title') }}</div>
						<form action="#" class="subscribe-form">
							<div class="form-group">
								<label for="subscribe_form__email">{{ $t('footer.newsletter.label') }}</label>
								<input class="form-control white !rounded-md" id="subscribe_form__email" type="email" :placeholder="$t('footer.newsletter.input-placeholder')">
							</div>
							<input class="btn btn-red !rounded-md" type="submit" :value="$t('footer.newsletter.button')">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom">
			<div class="container">
				<div class="row">
					<div class="copyright">
						<p>© 2021 Deserve LLC. All rights reserved</p>
					</div>
					<div class="legal-links">
						<nuxt-link exact :to="localePath('/legal/data-processing-policy')" active-class="active">{{ $t('legal.data-processing-policy') }}</nuxt-link>
						<nuxt-link exact :to="localePath('/legal/privacy-policy')" active-class="active">{{ $t('legal.privacy-policy') }}</nuxt-link>
					</div>
				</div>
			</div>
		</div>
	</footer>
</template>