<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<script src="{{ mix('js/app.js') }}" defer></script>
	
</head>

<body class="header-sticky">

	<div id="app" v-cloak>

		<!-- HEADER -->
		@include('layouts.top-nav')

		{{-- PAGE TITLE --}}
		<section class="bg-gray-900 text-white">
			<div class="container">

				<h1 class="h2">
					<code class="text-danger">\onemoore > </code>
					<span class="typed js-typified font-weight-light"></span>
					{{-- <div id="typed-strings">
						<p>Hello, world</p>
						<p>Home</p>
					</div> --}}
				</h1>

			</div>
		</section>

		{{-- K££PING TH£ LIGHTS ON --}}
		<section class="">
			<div class="container">
				<div class="row">
					<div class="col-7">
						<h3 class="m-0 font-weight-light">Keeping the lights on. <i class="fas fa-lightbulb text-warning"></i></h3>
						<p class="mt-3">The <em>minimum</em> monthly costs for providing this service!</p>
						<ul class="list-group list-group-flush rounded overflow-hidden">
							<li class="list-group-item pt-4 pb-4">
								<div class="d-flex">
									<div class="float-start p-3">
										<h5 class="m-0"><code class="text-danger">$&nbsp;&nbsp;5</code></h6>
									</div>
									<div class="pl--12 pr--12">
										<p class="text-dark font-weight-medium m-0">
											Hosting
										</p>
										<p class="m-0">
											The cost of the Virtual Private Server
										</p>
									</div>
								</div>
							</li>
							<li class="list-group-item pt-4 pb-4">
								<div class="d-flex">
									<div class="float-start p-3">
										<h5 class="m-0"><code class="text-danger">$&nbsp;12</code></h6>
									</div>
									<div class="pl--12 pr--12">
										<p class="text-dark font-weight-medium m-0">
											Server Management
										</p>
										<p class="m-0">
											For running the services that make the app work
										</p>
									</div>
								</div>
							</li>
							<li class="list-group-item pt-4 pb-4">
								<div class="d-flex">
									<div class="float-start p-3">
										<h5 class="m-0"><code class="text-danger">$&nbsp;50</code></h6>
									</div>
									<div class="pl--12 pr--12">
										<p class="text-dark font-weight-medium m-0">
											Financial Data API
										</p>
										<p class="m-0">
											For providing the data we need about the stocks
										</p>
									</div>
								</div>
							</li>
							<li class="list-group-item pt-4 pb-4 border-bottom-0">
								<div class="d-flex">
									<div class="float-start p-3">
										<h5 class="m-0"><code class="text-danger">$&nbsp;&nbsp;1</code></h6>
									</div>
									<div class="pl--12 pr--12">
										<p class="text-dark font-weight-medium m-0">
											Domain Registration
										</p>
										<p class="m-0">
											The cost of owning the onemoore.co.uk domain
										</p>
									</div>
								</div>
							</li>
						</ul>

						<p class="mt-4">That's 68USD or roughly 55GBP. And, on top of that, Stripe takes £0.20 + 1.4%
							per transaction off the top, that means there needs to be <strong>68</strong> subscribed 
							users for me to break even!</p>
					
					</div>
					<div class="col-5">
						<div class="text-center mt-5">
							<p class="py-5 display-5 text-gray-200">Because it's good to be transparent.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		{{-- TECH --}}
		<section class="py-5 bg-gray-200">
			<div class="container">
				<div class="row text-center-xs">
					<div class="col-12 col-md-8">
						<h3 class="m-0 font-weight-light">Things I'm good at!</h3>
						<p class="m-0">These are the technologies that I use. Every. Single. Day</p>
					</div>
					<div class="col-12 mt-4 d-block d-md-none"><!-- mobile spacer --></div>
					<div class="row mt-4">
						<div class="col-12 col-sm-6 col-lg-4 mb-4">
							<div class="h-100 shadow-xs rounded p-4 mb-4 mb-2-xs transition-hover-top transition-all-ease-150 text-decoration-none text-center"
								style="border: 2px solid #FF5E55">
								<img src="{{ asset('images/laravel.min.svg') }}" alt="">
								<h3 class="h6 py-3">Laravel</h3>
								<p>
									I've made it my mission to learn as much about the framework as possible! I've discovered
									the importance of developing a standard and sticking to best practices.
								</p>
							</div>
						</div>
			
						<div class="col-12 col-sm-6 col-lg-4 mb-4">
							<div class="h-100 shadow-xs rounded p-4 mb-4 mb-2-xs transition-hover-top transition-all-ease-150 text-decoration-none text-center"
								style="border: 2px solid #41B883">
								<img src="{{ asset('images/vuejs.png') }}" alt="" height="60">
								<h3 class="h6 py-3">Vue.js</h3>
								<p>
									Oh, how I hated you at first. But now... how did I ever live without you, Vue? I shudder to
									think of going back to jQuery.
								</p>
							</div>
			
						</div>
			
			
						<div class="col-12 col-sm-6 col-lg-4 mb-4">
			
							<div class="h-100 shadow-xs rounded p-4 mb-4 mb-2-xs transition-hover-top transition-all-ease-150 text-decoration-none text-center"
								style="border: 2px solid #0E5E73">
								<img src="{{ asset('images/mysql-6.svg') }}" alt="" height="60">
								<h3 class="h6 py-3">MySQL</h3>
								<p>
									Omnipresent in <em>almost</em> every system I've ever developed. It's just one of
									those skills you learn by necessity and take advantage of ever after.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		{{-- TIMELINE --}}
		<section>
			<div class="container">

				<div class="row">
					<div class="col-8">
						<h3 class="m-0 font-weight-light">My Life, abridged.</h3>
						<p class="mt-3">A timeline of some notable things!</p>
						<div class="timeline-container mt-5">
		
							<div class="d-flex mb-4">
								<i class="badge bg-white border-danger rounded-circle"></i>
								<div class="w--120 mx-1 flex-none font-weight-bold fs--18">2017 - Present</div>
								<div class="flex-grow-1">
									<span class="font-weight-bold">Web Developer</span> - One week after my final exam, 
										I rejoined the company that I worked for during my sandwich placement year at university. 
										I have gained vital experience and have had the oppurtunity to refine my abilities and 
										learn many new skills.
								</div>
							</div>
			
							<div class="d-flex mb-4">
								<i class="badge bg-white border-danger rounded-circle shadow-danger-md animate-pulse"></i>
								<div class="w--120 mx-1 flex-none font-weight-bold fs--18">2013 - <br>2017</div>
								<div class="flex-grow-1">
									<span class="font-weight-bold">BSc Computer Science</span> -
									Averaging over 80% across my three years of study I graduated 1st Class with Honours. My course included a 
									sandwich placement year in the industry, which meant that I had the invaluable opportunity 
									to gain a year's experience working for a real company, on real projects.
								</div>
							</div>
		
							<div class="d-flex mb-4">
								<i class="badge bg-white border-danger rounded-circle shadow-danger-md animate-pulse"></i>
								<div class="w--120 mx-1 flex-none font-weight-bold fs--18">2009 - <br>2011</div>
								<div class="flex-grow-1">
									<span class="font-weight-bold">BTEC in Music Practice</span> - I chose to stay
									close to home whilst pursuing a hobby and making the most of the free education
									available whilst still under 19 years of age.
								</div>
							</div>
		
							<div class="d-flex mb-4">
								<i class="badge bg-white border-danger rounded-circle shadow-danger-md animate-pulse"></i>
								<div class="w--120 mx-1 flex-none font-weight-bold fs--18">2007 - <br>2009</div>
								<div class="flex-grow-1">
									<span class="font-weight-bold">International Baccalaueate</span> - Similar to
									A-Levels here in the UK but more intense! We take 6 subjects and three have to be taken at 
									"Higher Level". I took Physics, Maths, Psychology, English Lit., Theatre Arts and Russian.
								</div>
							</div>
						</div>
					</div>
					<div class="col-4 text-center">
						<p class="mt-5 py-5 display-5 text-gray-200">Riveting stuff, <br>eh?</p>
						
					</div>
				</div>
			</div>
		</section>

		{{-- FOOTER --}}
		<footer id="footer" class="bg-gray-200">
			{{-- <div class="container">

				<div class="row">
					
					<div class="bg-distinct col-12 col-md-6 col-lg-4 text-center p-0 py-5">

						<div class="footer-svg-shape position-absolute absolute-top z-index-2 mt--n70 w-100 overflow-hidden pt--5">
							<svg viewBox="0 0 1440 28" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
								<path d="M0 28H1440C1440 28 1154 3.21961e-10 720 1.30487e-09C286 2.28777e-09 0 28 0 28Z"></path>
							</svg>
						</div>
						<p>My Socials</p>
						<div class="mt--12"> 
							<a href="#!" class="btn btn-sm btn-github transition-hover-top mb-2 rounded-circle" rel="noopener" aria-label="github page">
								<i class="fab fa-github"></i> 
							</a>
							<a href="#!" class="btn btn-sm btn-linkedin transition-hover-top mb-2 rounded-circle" rel="noopener" aria-label="linkedin page">
								<i class="fab fa-linkedin"></i> 
							</a>
						</div>

					</div>


					<div class="col-12 col-md-6 col-lg-8 py-5 fs--15 text-center-xs">

						<p>Links</p>

						<ul class="mt--30 mb-0 breadcrumb bg-transparent p-0 block-xs"> 
							<li class="breadcrumb-item"><a href="contact-1.html">Contact</a></li> 
							<li class="breadcrumb-item"><a href="about-us-1.html">About Us</a></li> 
							<li class="breadcrumb-item"><a href="page-terms-and-conditions.html">Terms &amp; Conditions</a></li> 
							<li class="breadcrumb-item"><a href="page-cookie.html">GDPR &amp; Cookies</a></li> 
						</ul>

					</div>

				</div>

			</div> --}}

			<div class="bg-distinct py-3 clearfix">
				<div class="container clearfix font-weight-light text-center-xs">
					<div class="fs--14 py-2 float-start float-none-xs m-0-xs">
						&copy; {{ date('Y') }} James Moore
					</div>
				</div>
			</div>

		</footer>

	</div> <!-- /.wrapper -->

	
</body>

</html>
