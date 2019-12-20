@extends('layouts.layout')

@section('content')

	<div class="flex-center position-ref full-height">
		<ul>
@foreach($tasks ?? array() as $task)
			<li>{{ $task->body }}</li>
@endforeach
		</ul>
	</div>

@endsection
