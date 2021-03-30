<template>
	<main>
		<div id="template_contacts">
			<div class="container">
				<div class="typed">
					<h1 class="page-title">Hello</h1>
				</div>
				<div class="email">
					<a href="mailto:corp@deserve.ru">corp@deserve.ru</a>
				</div>
				<div class="phone">
					<a href="tel:89101127174">8 (910) 112 71-74</a>
				</div>
				<div class="social-media">
					<a href="#" class="social-media-link fb" target="_blank">Facebook</a>
					<a href="#" class="social-media-link in" target="_blank">Instagram</a>
					<a href="#" class="social-media-link tw" target="_blank">Twitter</a>
					<a href="#" class="social-media-link ln" target="_blank">LinkedIn</a>
				</div>
			</div>
			<div class="container" style="margin-top: 75px;">
				<ul class="addresses">
					<li class="address-item">
						<h3 class="item-title">New York, USA (HQ)</h3>
						<div class="details">
							<address>750 Sing Sing Rd, Horseheads, NY, 14845</address>
							<p>Call: 469-537-2410 (Toll-free)</p>
							<p>Support time: Monday to Saturday <br>9:00 am to 5:30 pm</p>
						</div>
						<button class="btn btn-sm btn-light btn-view-address">
							<span>View location</span>
							<svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M560.02 32c-1.96 0-3.98.37-5.96 1.16L384.01 96H384L212 35.28A64.252 64.252 0 0 0 191.76 32c-6.69 0-13.37 1.05-19.81 3.14L20.12 87.95A32.006 32.006 0 0 0 0 117.66v346.32C0 473.17 7.53 480 15.99 480c1.96 0 3.97-.37 5.96-1.16L192 416l172 60.71a63.98 63.98 0 0 0 40.05.15l151.83-52.81A31.996 31.996 0 0 0 576 394.34V48.02c0-9.19-7.53-16.02-15.98-16.02zM224 90.42l128 45.19v285.97l-128-45.19V90.42zM48 418.05V129.07l128-44.53v286.2l-.64.23L48 418.05zm480-35.13l-128 44.53V141.26l.64-.24L528 93.95v288.97z"></path></svg>
						</button>
					</li>
					<li class="address-item">
						<h3 class="item-title">New York, USA (HQ)</h3>
						<div class="details">
							<address>750 Sing Sing Rd, Horseheads, NY, 14845</address>
							<p>Call: 469-537-2410 (Toll-free)</p>
							<p>Support time: Monday to Saturday <br>9:00 am to 5:30 pm</p>
						</div>
						<button class="btn btn-sm btn-light btn-view-address">
							<span>View location</span>
							<svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M560.02 32c-1.96 0-3.98.37-5.96 1.16L384.01 96H384L212 35.28A64.252 64.252 0 0 0 191.76 32c-6.69 0-13.37 1.05-19.81 3.14L20.12 87.95A32.006 32.006 0 0 0 0 117.66v346.32C0 473.17 7.53 480 15.99 480c1.96 0 3.97-.37 5.96-1.16L192 416l172 60.71a63.98 63.98 0 0 0 40.05.15l151.83-52.81A31.996 31.996 0 0 0 576 394.34V48.02c0-9.19-7.53-16.02-15.98-16.02zM224 90.42l128 45.19v285.97l-128-45.19V90.42zM48 418.05V129.07l128-44.53v286.2l-.64.23L48 418.05zm480-35.13l-128 44.53V141.26l.64-.24L528 93.95v288.97z"></path></svg>
						</button>
					</li>
				</ul>
			</div>
		</div>
	</main>
</template>

<script>

	import Typed from 'typed.js'
	
	export default {
		mounted () {
			var options = {
				strings: ['Hello', 'Здравствуйте', 'Bonjour', 'Hola', 'Guten Tag'],
				typeSpeed: 100,
				backSpeed: 30,
				backDelay: 700,
				startDelay: 700,
				loop: true,
				fadeOut: true,
			}

			var typed = new Typed('#template_contacts .page-title', options)
		}
	}

</script>