@extends('tasks._layout')

@section('content')
	
	<h1>Edit {{ $task->name }}</h1>
	
	<!-- if there are creation errors, they will show here -->
	{{ Html::ul($errors->all()) }}
	
	{{ Form::model($task, array('route' => array('tasks.update', $task->id), 'method' => 'PUT')) }}
	
	<div class="form-group">
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', null, array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('body', 'Body') }}
		{{ Form::text('body', null, array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('priority', 'Priority') }}
		{{ Form::text('priority', null, array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('status_id', 'Status') }}
		{{ Form::text('status_id', null, array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('responsible_person_id', 'Responsible Person') }}
		{{ Form::text('responsible_person_id', null, array('class' => 'form-control')) }}
	</div>
	
	{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
	
	{{ Form::close() }}

@endsection
