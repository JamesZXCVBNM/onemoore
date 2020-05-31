@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Login') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 offset-md-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

									<label class="form-check-label" for="remember">
										{{ __('Remember Me') }}
									</label>
								</div>
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Login') }}
								</button>

								@if (Route::has('password.request'))
									<a class="btn btn-link" href="{{ route('password.request') }}">
										{{ __('Forgot Your Password?') }}
									</a>
								@endif
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	
	
	{{-- <div class="row justify-content-center mt-5">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h3 class="m-0 font-weight-light">Keeping the lights on. <i class="fas fa-lightbulb text-warning"></i></h3>
					<p class="mt-3">The <em>minimum</em> monthly costs for providing this service!</p>
				</div>
				
				<div class="card-body border-bottom">
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
				<div class="card-body">
					<div class="text-center">
						<p class="py-3 display-5 text-gray-200">Because it's good to be transparent.</p>
					</div>
				</div>
			</div>
		</div> --}}

	   
	   
	</div>
</div>
@endsection
