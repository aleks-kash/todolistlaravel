@extends('tasks._layout')

@section('content')
	
	{{--<div class="flex-center position-ref full-height">--}}
		{{--<h1>{{ $task->body }}</h1>--}}
	{{--</div>--}}
	
	<h1>Showing Task: {{ $task->title }}</h1>
	
	<div class="jumbotron text-center">
		<h2>{{ $task->title }}</h2>
		<p>
			<strong>Title:</strong> {{ $task->title }}<br>
			<strong>Body:</strong> {{ $task->body }}<br>
			<strong>Priority:</strong> {{ $task->priority }}<br>
			<strong>StatusId:</strong> {{ $task->status_id }}<br>
			<strong>ResponsiblePersonId:</strong> {{ $task->responsible_person_id }}<br>
			<strong>Updated At:</strong> {{ $task->updated_at }}<br>
		</p>
	</div>

@endsection
