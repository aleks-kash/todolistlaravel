@extends('tasks._layout')

@section('content')
	
	<h1>Create a Tasks</h1>
	
	<!-- if there are creation errors, they will show here -->
	{{ Html::ul($errors->all()) }}
	
	{!! Form::open(array('url' => 'tasks')) !!}
	
	<div class="form-group">
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', Request::old('title'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('body', 'Body') }}
		{{ Form::text('body', Request::old('body'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('priority', 'Priority') }}
		{{ Form::text('priority', Request::old('priority'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('status_id', 'Status') }}
		{{ Form::text('status_id', Request::old('status_id'), array('class' => 'form-control')) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('responsible_person_id', 'Responsible Person') }}
		{{ Form::text('responsible_person_id', Request::old('responsible_person_id'), array('class' => 'form-control')) }}
	</div>
	
	{{--<div class="form-group">--}}
		{{--{{ Form::label('nerd_level', 'Nerd Level') }}--}}
		{{--{{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Request::old('nerd_level'), array('class' => 'form-control')) }}--}}
	{{--</div>--}}
	
	{{ Form::submit('Create the Task!', array('class' => 'btn btn-primary')) }}
	
	{!! Form::close() !!}

@endsection