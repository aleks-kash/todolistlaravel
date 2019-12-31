@extends('layouts.layout')

@extends('tasks._navbar')

@section('contents')
		
	<main class="py-4">
		<div class="container-fluid">
			@yield('content')
		</div>
	</main>

@endsection
