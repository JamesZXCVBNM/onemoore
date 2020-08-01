<!doctype html>
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
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'OneMoore') }}</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
</head>

<body class="layout-admin aside-sticky header-sticky">
	
	<div id="app" class="d-flex align-items-stretch flex-column">
		
		@if (!Request::is('/'))
			@include('layouts.top-nav')
		@endif

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
