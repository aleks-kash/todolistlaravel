@extends('layouts.layout')

@extends('tasks._navbar')

@section('contents')
	
	<div id="app">
		<main class="py-4">
			<div class="container-fluid">
				@yield('content')
			</div>
		</main>
	</div>
	
@endsection
