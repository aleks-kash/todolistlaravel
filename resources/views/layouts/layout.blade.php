<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>@yield('title')</title>
	
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	
	<!-- Styles -->
	@if (config('app.env') == 'local')
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
	@else
		<link rel="stylesheet" href="{{asset(mix('css/app.css'), true)}}">
	@endif
	<style>
		html, body {
			font-family: 'Nunito', sans-serif;
			height: 100vh;
			margin: 0;
		}
		
		.full-height {
			height: 100vh;
		}
		
		.flex-center {
			align-items: center;
			display: flex;
			justify-content: center;
		}
		
		.position-ref {
			position: relative;
		}
		
		.top-right {
			position: absolute;
			right: 10px;
			top: 18px;
		}
		
		.content {
			text-align: center;
		}
		
		.title {
			font-size: 84px;
		}
		
		.links > a {
			color: #636b6f;
			padding: 0 25px;
			font-size: 13px;
			font-weight: 600;
			letter-spacing: .1rem;
			text-decoration: none;
			text-transform: uppercase;
		}
		
		.m-b-md {
			margin-bottom: 30px;
		}
	</style>
</head>
<body>

	<!-- navbar -->
	@yield('navbar')
	
	<!-- content -->
	@yield('contents')
	
	<!-- Scripts -->
	@if (config('app.env') == 'local')
		<script src="{{asset('js/app.js')}}"></script>
	@else
		<script src="{{asset(mix('js/app.js'), true)}}"></script>
	@endif
	
	@stack('scripts')
</body>
</html>
