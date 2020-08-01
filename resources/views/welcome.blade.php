<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="/images/favicon/site.webmanifest">
	<link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta charset="utf-8">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="an app for tracking your dividends from investments">

	<title>OneMoore</title>

	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<script src="{{ mix('js/app.js') }}"></script>
	<script src="{{ mix('js/home.js') }}" defer></script>
	
</head>

<body class="header-sticky">

	<div id="app">

		<!-- HEADER -->
		{{-- @include('layouts.top-nav') --}}

		{{-- PAGE TITLE --}}
		<section class="bg-gray-900 text-white">
			<div class="container">
				<h1 class="h2">
					<img src="/images/onemoore.png" alt="" srcset="">
				</h1>
				<p class="fs--18">
					Dividend Tracking <span class="mx-2 text-gray-600">|</span> Portfolio Sharing <span class="mx-2 text-gray-600">|</span> &amp; more to come!
				</p>
			</div>
		</section>

		<b-tabs justified card nav-class="h4" content-class="p-3" active-nav-item-class="text-primary">
			<b-tab title="Dividend Tracking App">
				<div class="container py-5">
					<b-row>
						<b-col>
							<p>
								<h6 class="mb-3">
									...the <u class="text-primary">affordable</u> 
									Dividend &amp; Portfolio Tracking Tool
								</h6>
								{{-- This tool was orignally developed for my personal use. I've spent many, many hours
								getting it ready to share with the world, so I hope you find it useful too :) --}}
							</p>
						</b-col>
						<b-col class="p-4 text-center">
							<b-button :href="'/dashboard'" class="m-3 text-center w-25 shadow-danger-md" variant="outline-primary">
								<i class="fas fa-sign-in-alt fa-fw fa-2x ml-2"></i><br>Login
							</b-button>
							<b-button :href="'/register'" class="m-3 text-center w-25 shadow-danger-md" variant="outline-primary">
								<i class="fas fa-user-plus fa-fw fa-2x ml-2"></i><br>Register
							</b-button>
						</b-col>
					</b-row>
				</div>


				{{-- GET STARTED --}}
				<section class="py-2 bg-light mb-1 border">
					<div class="container">
						<div class="row">
							<div class="col-10 mx-auto col-lg-4 py-4 text-center">
								<a href="/register" class="btn btn-success my-5">Get started for free</a>
							</div>
							<div class="col-10 mx-auto col-lg-8 py-5 pb-0-xs text-center-md text-center-xs">
								<h3>You can try it out for <span class="text-success">free!</h3>
								<p>Start for free with no card details required! If you find the tool useful, then consider subscribing <i class="far fa-smile"></i>
									Plans start from £0.99 per month (just 99 pennies!), so its super cheap!</p>
							</div>
						</div>
					</div>
				</section>
		
				{{-- FEATURES --}}
				<section>
					<div class="container">
						<div class="row">
							<div class="col-6">
								<div class="d-flex mb-4">
									<div class="text-primary">
										<i class="fas fa-calendar-alt fa-fw fa-2x"></i>
									</div>
									<div class="ml-4 mr-4">
										<h3 class="h5 mb-1">Track your dividends</h3>
										<p>Know when to expect your dividends and how much to expect each month!</p>
									</div>
								</div>
								<div class="d-flex mb-4">
									<div class="text-primary">
										<i class="fas fa-share-alt fa-fw fa-2x"></i>
									</div>
									<div class="ml-4 mr-4">
										<h3 class="h5 mb-1">View shared portfolios</h3>
										<p>Want some investing inspiration? View portfolios that have been shared by other users.</p>
									</div>
								</div>
								<div class="d-flex mb-4">
									<div class="text-primary">
										<i class="fas fa-piggy-bank fa-fw fa-2x"></i>
									</div>
									<div class="ml-4 mr-4">
										<h3 class="h5 mb-1">Low Cost</h3>
										<p>I've made it as cheap as possible! Nobody wants to pay expensive subscriptions
											that eat into their profit margins, especially when you have a small portfolio</p>
									</div>
								</div>
							</div>
							<div class="col-6">
								<img src="/images/screenshot.png" class="img-thumbnail" width="100%" alt="" srcset="">
							</div>
						</div>
					</div>
				</section>
		
				{{-- K££PING TH£ LIGHTS ON --}}
				<section class="bg-light border">
					<div class="container">
						<div class="row">
							<div class="col-7">
								<h3 class="m-0 font-weight-light">Keeping the lights on. <i class="fas fa-lightbulb text-warning"></i></h3>
								<p class="mt-3">The <em>minimum</em> monthly costs for providing this service!</p>
								<ul class="list-group list-group-flush rounded overflow-hidden bg-light">
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
									<p class="py-5 display-5 text-gray-300">
										Because it's good to be transparent. <br>
										<i class="fas fa-ghost mt-4"></i>
									</p>
								</div>
							</div>
						</div>
					</div>
				</section>
			</b-tab>

			<b-tab title="About Me">
				<section>
					<div class="container">
						<div class="row">
							<div class="col-7">
								{{-- <h1 class="font-weight-light">Web Developer, Fledgling Investor</h1> --}}
								<h3 class="m-0">James</h3>
								<h4 class="m-0 font-weight-light my-4">
									<span class="badge badge-primary badge-pill">Web Developer</span>
									<span class="badge badge-primary badge-pill">Fledgling Investor</span>
									{{-- Web Developer, Fledgling Investor --}}
								</h4>
								<p>
									<i class="fas fa-quote-left mr-1"></i> Having recently entered the world of investing in the stock market,
									I decided to make a tool that would help me track my dividends and when I should expect them.
									Because the tool is useful for me, I figured it'd probably be useful for others too... So I decided to
									share it with the world - and let the world help me keep it going with marginal a subscription fee.
									Hello, world.					
								</p>
							</div>
							<div class="col-5">
								<img src="/images/whodis.jpg" class="img-thumbnail float-right w--220" alt="" srcset="">
							</div>
						</div>
					</div>
				</section>
		
				{{-- TECH --}}
				<section class="py-5 bg-light">
					<div class="container">
						<div class="row text-center-xs">
							<div class="col-12 col-md-8">
								<h3 class=" font-weight-light">Things I'm good at!</h3>
								<p class="m-0">These are the things that I use on a daily basis. 
									For those that are interested; this website is developed using 
									these frameworks, tools &amp; technologies.</p>
							</div>
							<div class="col-12 mt-4 d-block d-md-none"><!-- mobile spacer --></div>
							<div class="row mt-4">
		
								{{-- Laravel --}}
								<div class="col-12 col-sm-6 col-lg-4 mb-4">
									<div class="h-100 shadow-xs rounded p-4 mb-4 mb-2-xs transition-hover-top transition-all-ease-150 text-decoration-none text-center"
										style="border: 2px solid #FF5E55">
										<img src="{{ asset('images/laravel.min.svg') }}" alt="">
										<h3 class="h6 py-3">Laravel</h3>
										<p>
											I've made it my mission to learn as much about Laravel as possible! I've discovered
											the importance of developing a standard and sticking to best practices.
										</p>
									</div>
								</div>
					
								{{-- Vue --}}
								<div class="col-12 col-sm-6 col-lg-4 mb-4">
									<div class="h-100 shadow-xs rounded p-4 mb-4 mb-2-xs transition-hover-top transition-all-ease-150 text-decoration-none text-center"
										style="border: 2px solid #41B883">
										<img src="{{ asset('images/vuejs.png') }}" alt="" height="60">
										<h3 class="h6 py-3">Vue.js</h3>
										<p>
											Remember the dark days of DOM manipulation with jQuery? I wish I didn't. Let's hope to never go back there again.
										</p>
									</div>
					
								</div>
					
								{{-- MySQL --}}
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
							<div class="row mt-2">
								{{-- Bootstrap --}}
								<div class="col-12 col-sm-6 col-lg-4 mb-4">
									<div class="h-100 shadow-xs rounded p-4 mb-4 mb-2-xs transition-hover-top transition-all-ease-150 text-decoration-none text-center"
									style="border: 2px solid #7952B3">
										<img src="{{ asset('images/bootstrap.png') }}" alt="" height="60">
										<h3 class="h6 py-3">Bootstrap</h3>
										<p>
											If there's one thing I've never liked doing in the web dev world, it's messing with CSS.
											For making it so that I rarely have to, I'd like to thank the team that made Bootstrap.
										</p>
									</div>
								</div>
		
								{{-- SASS --}}
								<div class="col-12 col-sm-6 col-lg-4 mb-4">
									<div class="h-100 shadow-xs rounded p-4 mb-4 mb-2-xs transition-hover-top transition-all-ease-150 text-decoration-none text-center"
									style="border: 2px solid #CF6B9F">
										<img src="{{ asset('images/sass.png') }}" alt="" height="60">
										<h3 class="h6 py-3">SASS</h3>
										<p>
											For the times when digging into CSS is unavoidable; SASS is there to make it bearable.
										</p>
									</div>
								</div>
		
								{{-- Git --}}
								<div class="col-12 col-sm-6 col-lg-4 mb-4">
									<div class="h-100 shadow-xs rounded p-4 mb-4 mb-2-xs transition-hover-top transition-all-ease-150 text-decoration-none text-center"
									style="border: 2px solid #F05033">
										<img src="{{ asset('images/git.png') }}" alt="" height="60">
										<h3 class="h6 py-3">Git</h3>
										<p>
											It's got some weird naming conventions but, really, who uses anything else these days? You've got
											to be a special kind of edgy to be using Mercurial or SVN.
										</p>
									</div>
								</div>
							</div>
							<div class="row mt-2">
								{{-- Webpack --}}
								<div class="col-12 col-sm-6 col-lg-4 mb-4">
									<div class="h-100 shadow-xs rounded p-4 mb-4 mb-2-xs transition-hover-top transition-all-ease-150 text-decoration-none text-center"
									style="border: 2px solid #8ED5FA">
										<img src="{{ asset('images/webpack.png') }}" alt="" height="60">
										<h3 class="h6 py-3">Webpack</h3>
										<p>
											Webpack makes my life easier. Who doesn't like an easy life?
										</p>
									</div>
								</div>
		
								{{-- JS --}}
								<div class="col-12 col-sm-6 col-lg-4 mb-4">
									<div class="h-100 shadow-xs rounded p-4 mb-4 mb-2-xs transition-hover-top transition-all-ease-150 text-decoration-none text-center"
									style="border: 2px solid #F0DB4F">
										<img src="{{ asset('images/js.png') }}" alt="" height="60">
										<h3 class="h6 py-3">JavaScript</h3>
										<p>
											JavaScript.
										</p>
									</div>
								</div>
		
								{{-- PHP --}}
								<div class="col-12 col-sm-6 col-lg-4 mb-4">
									<div class="h-100 shadow-xs rounded p-4 mb-4 mb-2-xs transition-hover-top transition-all-ease-150 text-decoration-none text-center"
									style="border: 2px solid #777BB3">
										<img src="{{ asset('images/php.svg') }}" alt="" height="60">
										<h3 class="h6 py-3">PHP</h3>
										<p>
											Some people hate it, others only mildly dislike it, but without it there would be no Laravel - and for that
											it deserves a mention.
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
								<p class="mt-3">The road to becoming a Web Developer was full of twists and turns but was where I was always meant to be</p>
								<div class="timeline-container mt-5">
				
									<div class="d-flex mb-4">
										<i class="badge bg-white border-danger rounded-circle"></i>
										<div class="w--120 mx-1 flex-none font-weight-bold fs--18">2017 - Present</div>
										<div class="flex-grow-1">
											<span class="font-weight-bold">Web Developer</span> - One week after my final exam, 
												I rejoined the company that I worked for during my sandwich placement year at university. 
												I have gained vital experience and have had the opportunity to refine my abilities and 
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
										<div class="w--120 mx-1 flex-none font-weight-bold fs--18">2011 - <br>2013</div>
										<div class="flex-grow-1">
											<span class="font-weight-bold">The dark years</span>
										</div>
									</div>
				
									<div class="d-flex mb-4">
										<i class="badge bg-white border-danger rounded-circle shadow-danger-md animate-pulse"></i>
										<div class="w--120 mx-1 flex-none font-weight-bold fs--18">2009 - <br>2011</div>
										<div class="flex-grow-1">
											<span class="font-weight-bold">BTEC in Music Practice</span> - Personal circumstances drove me to stay
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
											"Higher Level". I took Physics, Maths, Psychology, English Lit., Theatre Arts and Russian
										</div>
									</div>
								</div>
							</div>
							<div class="col-4 text-center">
								{{-- <p class="mt-5 py-5 display-5 text-gray-200">Riveting stuff, <br>eh?</p> --}}
								
							</div>
						</div>
					</div>
				</section>
			</b-tab>
		</b-tabs>

		

		{{-- FOOTER --}}
		<footer id="footer" class="bg-gray-900">
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
