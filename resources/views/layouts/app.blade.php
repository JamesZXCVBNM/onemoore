<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'OneMoore') }}</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="layout-admin aside-sticky header-sticky">
	
	<div id="app" class="d-flex align-items-stretch flex-column">
		
		@include('layouts.top-nav')

		<div id="wrapper_content" class="d-flex flex-fill">

			@include('layouts.side-nav')

			<div id="middle" class="flex-fill">

				@yield('content')			

			</div>

		</div>

	</div>

	<script src="{{ asset('js/app.js') }}"></script>
	@yield('scripts')

</body>

</html>
