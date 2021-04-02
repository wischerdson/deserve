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
						<!-- <div class="office-address">
							<p class="short-addr">Смоленск, Россия (штаб-квартира)</p>
							<p class="full-addr">Смоленск, Руновский переулок, 10с1, 115184 <br>
							Телефон: +79101127174 (звонок бесплатный)</p>
						</div> -->
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
									<a href="#">{{ $t('navigation-links.about-agency') }}</a>
								</li>
								<li class="link-item">
									<a href="#">{{ $t('navigation-links.services') }}</a>
								</li>
								<li class="link-item">
									<a href="#">{{ $t('navigation-links.our-cases') }}</a>
								</li>
							</div>
							<div class="links-column">
								<li class="link-item">
									<a href="#">{{ $t('navigation-links.open-jobs') }}</a>
								</li>
								<li class="link-item">
									<a href="#">{{ $t('navigation-links.contacts') }}</a>
								</li>
							</div>
						</ul>
					</div>
					<div class="column">
						<div class="column-title">{{ $t('footer.newsletter.title') }}</div>
						<form action="#" class="subscribe-form">
							<div class="form-group">
								<label for="subscribe_form__email">{{ $t('footer.newsletter.label') }}</label>
								<input class="form-control white" id="subscribe_form__email" type="email" :placeholder="$t('footer.newsletter.input-placeholder')">
							</div>
							<input class="btn btn-red" type="submit" :value="$t('footer.newsletter.button')">
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
						<a href="#">{{ $t('legal.data-processing-policy') }}</a>
						<a href="#">{{ $t('legal.privacy-policy') }}</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
</template>