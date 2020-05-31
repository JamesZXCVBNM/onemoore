<header id="header" class="bg-gray-900 ">
	<div class="container-fluid position-relative">
		<nav class="navbar navbar-expand-lg navbar-dark justify-content-lg-between justify-content-md-inherit h--70">

			<div class="align-items-start">

				<!-- 
					sidebar toggler 
				-->
				<a href="#aside-main"
					class="btn-sidebar-toggle h-100 d-inline-block d-lg-none justify-content-center align-items-center p-2">
					<span class="group-icon">
						<i>
							<svg width="25" viewBox="0 0 20 20">
								<path
									d="M 19.9876 1.998 L -0.0108 1.998 L -0.0108 -0.0019 L 19.9876 -0.0019 L 19.9876 1.998 Z">
								</path>
								<path
									d="M 19.9876 7.9979 L -0.0108 7.9979 L -0.0108 5.9979 L 19.9876 5.9979 L 19.9876 7.9979 Z">
								</path>
								<path
									d="M 19.9876 13.9977 L -0.0108 13.9977 L -0.0108 11.9978 L 19.9876 11.9978 L 19.9876 13.9977 Z">
								</path>
								<path
									d="M 19.9876 19.9976 L -0.0108 19.9976 L -0.0108 17.9976 L 19.9876 17.9976 L 19.9876 19.9976 Z">
								</path>
							</svg>
						</i>

						<i>
							<svg width="25" viewBox="0 0 47.971 47.971">
								<path
									d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z">
								</path>
							</svg>
						</i>
					</span>
				</a>


				<!-- 
					Logo : height: 60px max
					visibility : mobile only
				-->
				<a class="navbar-brand d-inline-block d-lg-none" href="index.html">
					<img src="https://picsum.photos/110/60" width="110" height="60" alt="...">
				</a>


			</div>

			@auth
				<!-- NAVIGATION -->
				<div class="collapse navbar-collapse" id="navbarMainNav">


					<!-- MOBILE MENU NAVBAR -->
					<div class="navbar-xs d-none">

						<!-- mobile menu button : close -->
						<button class="navbar-toggler pt-0" type="button" data-toggle="collapse"
							data-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false"
							aria-label="Toggle navigation">
							<svg width="20" viewBox="0 0 20 20">
								<path
									d="M 20.7895 0.977 L 19.3752 -0.4364 L 10.081 8.8522 L 0.7869 -0.4364 L -0.6274 0.977 L 8.6668 10.2656 L -0.6274 19.5542 L 0.7869 20.9676 L 10.081 11.679 L 19.3752 20.9676 L 20.7895 19.5542 L 11.4953 10.2656 L 20.7895 0.977 Z">
								</path>
							</svg>
						</button>

						<!-- 
							Optional Mobile Menu Logo 
							Logo : height: 70px max
						-->
						<a class="navbar-brand px-4 w-auto" href="index.html">
							<img src="assets/images/logo/logo_dark.svg" width="110" height="70" alt="...">
						</a>

					</div>
					<!-- /MOBILE MENU NAVBAR -->
					
					<!-- Dropdowns -->
					<ul class="navbar-nav align-items-center">

						<!--  -->
						<li class="nav-item dropdown">

							<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false" id="mainNavHome">
								Shortcuts
							</a>

							<ul class="dropdown-menu dropdown-menu-clean" aria-labelledby="mainNavHome">

								<li class="dropdown-item dropdown">
									<a class="dropdown-link" href="#!" data-toggle="dropdown">
										<i class="fi fi-cart-1"></i>
										Orders
									</a>

									<ul class="dropdown-menu dropdown-menu-hover shadow-lg b-0 m-0">
										<li class="dropdown-item">
											<a class="dropdown-link" href="#!">
												<i class="fi fi-plus"></i>
												Create Order
											</a>
										</li>
										<li class="dropdown-item">
											<a class="dropdown-link" href="#!">
												<i class="fi fi-list-checked"></i>
												List Orders
											</a>
										</li>
										<li class="dropdown-item">
											<a class="dropdown-link" href="#!">
												<i class="fi fi-box"></i>
												Archived Orders
											</a>
										</li>
										<li class="dropdown-item">
											<a class="dropdown-link" href="#!">
												<i class="fi fi-close"></i>
												Canceled Orders
											</a>
										</li>
									</ul>

								</li>
								<li class="dropdown-item">
									<a class="dropdown-link" href="#!">
										<i class="fi fi-user-plus"></i>
										Create Account
									</a>
								</li>
								<li class="dropdown-item">
									<a class="dropdown-link" href="#!">
										<i class="fi fi-users"></i>
										Manage Users
									</a>
								</li>
								<li class="dropdown-item">
									<a class="dropdown-link" href="#!">
										<i class="fi fi-graph"></i>
										Reports
									</a>
								</li>
								<li class="dropdown-item">
									<a class="dropdown-link" href="#!">
										<i class="fi fi-task-list"></i>
										Tasks
									</a>
								</li>
							</ul>

						</li>

						<!--  -->
						<li class="nav-item">

							<a class="nav-link px-1" href="#!">
								<span class="py-2 px-3 rounded">
									<i class="fi fi-squared-dots"></i>
									<span>Apps</span>
								</span>
							</a>

						</li>
					</ul>
					<!-- /Dropdowns -->
					
				</div>
				<!-- /NAVIGATION -->
			@endauth


			<!-- OPTIONS -->
			<ul class="list-inline list-unstyled mb-0 d-flex align-items-end">
				@guest
					<li class="nav-item">
						<a class="btn btn-primary"
							href="{{ route('login') }}">Sign In</a>
					</li>
					@if (Route::has('register'))
						<li class="nav-item">
							<a class="btn btn-primary ml-3"
								href="{{ route('register') }}">Register</a>
						</li>
					@endif
				@else

					<!-- messages  d-none d-md-inline-block -->
					<li class="list-inline-item ml--6 mr--6 dropdown">

						<a href="#" id="dropdownMessageOptions"
							class="btn btn-sm rounded-circle btn-light dropdown-toggle" data-toggle="dropdown"
							aria-expanded="false" aria-haspopup="true">

							<!-- badge -->
							<span
								class="badge badge-danger shadow-danger-md animate-pulse fs--10 p--3 mt--n3 position-absolute end-0">1</span>

							<span class="group-icon">
								<i class="fas fa-envelope"></i>
								<i class="fas fa-close"></i>
							</span>
						</a>

						<div aria-labelledby="dropdownMessageOptions"
							class="dropdown-menu dropdown-menu-clean dropdown-menu-navbar-autopos dropdown-menu-invert dropdown-click-ignore p-0 mt--18 fs--15 w--300">

							<div class="dropdown-header fs--14 py-3">

								<a href="#!"
									class="js-ajax-modal btn btn-sm btn-primary btn-soft b-0 px-2 py-1 m-0 fs--12 mt--n3 float-end js-modalified"
									data-href="_ajax/admin_modal_message_write.html" data-ajax-modal-size="modal-md"
									data-ajax-modal-centered="false" data-ajax-modal-backdrop="static">
									+ WRITE
								</a>

								1 NEW MESSAGE

							</div>

							<div class="dropdown-divider"></div>

							<div class="max-h-50vh scrollable-vertical">

								<!-- MESSAGE -->
								<a href="#!"
									class="clearfix dropdown-item font-weight-medium px-3 border-bottom border-light overflow-hidden shadow-md-hover bg-theme-color-light">

									<span class="badge badge-success float-end font-weight-normal mt-1">new</span>
									<span class="badge badge-danger float-end font-weight-normal mt-1">urgent</span>

									<!-- image -->
									<div class="w--50 h--50 mb-2 mt-1 rounded-circle bg-cover bg-light float-start"
										style="background-image:url('../../html_frontend/demo.files/images/icons/user80.png')">
									</div>

									<!-- author -->
									<strong class="d-block text-truncate">John Doe</strong>

									<!-- subject -->
									<p class="fs--14 m-0 text-truncate font-weight-normal">
										Spartans has no weekends, so neither you!
									</p>

									<!-- date -->
									<small class="d-block fs--11 text-muted">
										Jan 22, 2019 / 02:21:46pm
									</small>

								</a>
								<!-- /MESSAGE -->

								<!-- MESSAGE -->
								<a href="#!"
									class="clearfix dropdown-item font-weight-medium px-3 border-bottom border-light overflow-hidden shadow-md-hover">

									<!-- image -->
									<div class="w--50 h--50 mb-2 mt-1 rounded-circle bg-cover bg-light float-start"
										style="background-image:url('../../html_frontend/demo.files/images/unsplash/team/michael-dam-mEZ3PoFGs_k-unsplash.jpg')">
									</div>

									<!-- author -->
									<strong class="d-block text-truncate">Michael Dam</strong>

									<!-- subject -->
									<p class="fs--14 m-0 text-truncate font-weight-normal">
										Go with Smarty, you can't go wrong, trust me
									</p>

									<!-- date -->
									<small class="d-block fs--11 text-muted">
										Jan 22, 2019 / 02:21:46pm
									</small>

								</a>
								<!-- /MESSAGE -->

								<!-- MESSAGE -->
								<a href="#!"
									class="clearfix dropdown-item font-weight-medium px-3 border-bottom border-light overflow-hidden shadow-md-hover">

									<!-- image -->
									<div class="w--50 h--50 mb-2 mt-1 rounded-circle bg-cover bg-light float-start"
										style="background-image:url('../../html_frontend/demo.files/images/unsplash/team/joseph-gonzalez-iFgRcqHznqg-unsplash.jpg')">
									</div>

									<!-- author -->
									<strong class="d-block text-truncate">Joseph Gonzalez</strong>

									<!-- subject -->
									<p class="fs--14 m-0 text-truncate font-weight-normal">
										RE: No Subject
									</p>

									<!-- date -->
									<small class="d-block fs--11 text-muted">
										Jan 22, 2019 / 02:21:46pm
									</small>

								</a>
								<!-- /MESSAGE -->

								<!-- MESSAGE -->
								<a href="#!"
									class="clearfix dropdown-item font-weight-medium px-3 border-bottom border-light overflow-hidden shadow-md-hover">

									<!-- image -->
									<div class="w--50 h--50 mb-2 mt-1 rounded-circle bg-cover bg-light float-start"
										style="background-image:url('../../html_frontend/demo.files/images/unsplash/team/erik-mclean-06vpBIHmiYc-unsplash.jpg')">
									</div>

									<!-- author -->
									<strong class="d-block text-truncate">Erik Mclean</strong>

									<!-- subject -->
									<p class="fs--14 m-0 text-truncate font-weight-normal">
										Indeed, this is unbeliveable
									</p>

									<!-- date -->
									<small class="d-block fs--11 text-muted">
										Jan 22, 2019 / 02:21:46pm
									</small>

								</a>
								<!-- /MESSAGE -->

								<!-- MESSAGE -->
								<a href="#!"
									class="clearfix dropdown-item font-weight-medium px-3 border-bottom border-light overflow-hidden shadow-md-hover">

									<!-- image -->
									<div class="w--50 h--50 mb-2 mt-1 rounded-circle bg-cover bg-light float-start"
										style="background-image:url('../../html_frontend/demo.files/images/unsplash/team/valerie-elash-9IL_stSpvOU-unsplash.jpg')">
									</div>

									<!-- author -->
									<strong class="d-block text-truncate">Valerie Elash</strong>

									<!-- subject -->
									<p class="fs--14 m-0 text-truncate font-weight-normal">
										RE: No Subject
									</p>

									<!-- date -->
									<small class="d-block fs--11 text-muted">
										Jan 22, 2019 / 02:21:46pm
									</small>

								</a>
								<!-- /MESSAGE -->

							</div>

							<div class="dropdown-divider mb-0"></div>

							<a href="#!"
								class="prefix-icon-ignore dropdown-footer dropdown-custom-ignore font-weight-medium pt-3 pb-3">
								<i class="fi fi-arrow-end fs--11"></i>
								<span class="d-inline-block pl-2 pr-2">View all</span>
							</a>
						</div>

					</li>

					<!-- account -->
					<li class="list-inline-item ml--6 mr--6 dropdown">

						<a href="#" id="dropdownAccountOptions"
							class="btn btn-sm btn-light dropdown-toggle btn-pill pl--12 pr--12"
							data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">

							<span class="group-icon m-0">
								<i class="fas w--15 fa-user"></i>
								<i class="fas w--15 fa-times-circle"></i>
							</span>

							<span class="fs--14 d-none d-sm-inline-block font-weight-medium">{{ Auth::user()->name }}</span>
						</a>

						<div aria-labelledby="dropdownAccountOptions"
							class="prefix-link-icon prefix-icon-dot dropdown-menu dropdown-menu-clean dropdown-menu-navbar-autopos dropdown-menu-invert dropdown-click-ignore p-0 mt--18 fs--15 w--300">

							<div class="dropdown-header fs--14 py-4">

								<!-- profile image -->
								<div class="w--60 h--60 rounded-circle bg-light bg-cover float-start"
									style="background-image:url('https://picsum.photos/60/60')">
								</div>

								<!-- user detail -->
								<span class="d-block font-weight-medium text-truncate fs--16">{{ Auth::user()->name }}</span>
								<span
									class="d-block text-muted font-weight-medium text-truncate">{{ Auth::user()->email }}</span>
								<small class="d-block text-muted"><b>Last Login:</b> 2019-09-03 01:48</small>

							</div>

							<div class="dropdown-divider"></div>

							<a href="#!" target="_blank" class="dropdown-item text-truncate font-weight-medium">
								Notes
								<small class="d-block text-muted">personal encypted notes</small>
							</a>

							<a href="#!" target="_blank" class="dropdown-item text-truncate font-weight-medium">
								<span class="badge badge-success float-end font-weight-normal mt-1">3 new</span>
								Messages
								<small class="d-block text-muted">internal messaging system</small>
							</a>

							<a href="#!" target="_blank" class="dropdown-item text-truncate font-weight-medium">
								<span class="badge badge-danger float-end font-weight-normal mt-1">1 unpaid</span>
								Invoices
								<small class="d-block text-muted">montly billing</small>
							</a>

							<a href="#!" class="dropdown-item text-truncate font-weight-medium">
								Account Settings
								<small class="d-block text-muted">profile, password and more...</small>
							</a>

							<a href="#!" class="dropdown-item text-truncate font-weight-medium">
								Upgrade
								<small class="d-block text-muted">upgrade your account</small>
							</a>

							<div class="dropdown-divider mb-0"></div>

							<a class="prefix-icon-ignore dropdown-footer dropdown-custom-ignore font-weight-medium pt-3 pb-3" 
								href="{{ route('logout') }}" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();"
							>
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}"
								method="POST" style="display: none;">
								@csrf
							</form>
						</div>

					</li>
				@endguest

			</ul>
			<!-- /OPTIONS -->


		</nav>
	</div>
</header>