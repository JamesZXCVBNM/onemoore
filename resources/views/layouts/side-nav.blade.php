<aside id="aside-main"
	class="aside-start bg-danger overlay-dark overlay-opacity-5 font-weight-light aside-hide-xs d-flex flex-column h-auto">


	<!-- 
		LOGO 
		visibility : desktop only
	-->
	<div class="d-none d-sm-block">
		<div class="clearfix d-flex justify-content-between">

			<!-- Logo : height: 60px max -->
			<a class="w-100 align-self-center navbar-brand p-3" href="index.html">
				{{-- OneMoore --}}
				<img src="{{ asset('images/onemoore.png') }}" width="150" alt="...">
			</a>

		</div>
	</div>
	<!-- /LOGO -->


	<div class="aside-wrapper scrollable-vertical scrollable-styled-light align-self-baseline h-100 w-100">

		<!--

			All parent open navs are closed on click!
			To ignore this feature, add .js-ignore to .nav-deep

			Links height (paddings):
				.nav-deep-xs
				.nav-deep-sm
				.nav-deep-md  	(default, ununsed class)

			.nav-deep-hover 	hover background slightly different
			.nav-deep-bordered	bordered links
		-->

		@auth
		<nav class="nav-deep nav-deep-dark nav-deep-hover fs--15 pb-5">
			<ul class="nav flex-column">

				<li class="nav-title mt-5">
					<h6 class="fs--15 mb-1 text-white font-weight-normal">Navigation</h6>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="/home">
						<i class="fas fa-fw fa-th-large"></i>
						<b>Dashboard</b>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="/home">
						<i class="fas fa-fw fa-pound-sign"></i>
						<b>Portfolio</b>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="/home">
						<i class="fas fa-fw fa-share-alt"></i>
						<b>Shared Portfolios</b>
					</a>
				</li>


				<li class="nav-item">
					<a class="nav-link" href="#">
						<i class="fas fa-fw fa-user-circle"></i>
						<span class="badge badge-warning float-end fs--11 mt-1">upgrade</span>
						Account
					</a>

				</li>
			</ul>
		</nav>
		@endauth

	</div>
</aside>