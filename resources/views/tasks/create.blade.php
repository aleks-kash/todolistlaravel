@extends('tasks._layout')

@section('content')
	
	<div class="container">
		
		<h1>Create a Tasks</h1>
		
		@if (Session::has('message'))
			<div class="alert alert-success" role="alert">
				{{ Session::get('message') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
			</div>
		@endif
		
		{!! Form::open(array('url' => 'tasks')) !!}
		
		<div class="form-group">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', Request::old('title'), array('class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''))) }}
			@if ($errors->has('title'))
				<span class="help-block invalid-feedback">
			      <strong>{{ $errors->first('title') }}</strong>
				</span>
			@endif
		</div>
		
		<div class="form-group">
			{{ Form::label('body', 'Body') }}
			{{ Form::text('body', Request::old('body'), array('class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''))) }}
			@if ($errors->has('body'))
				<span class="help-block invalid-feedback">
			      <strong>{{ $errors->first('body') }}</strong>
				</span>
			@endif
		</div>
		
		<div class="form-group">
			{{ Form::label('priority', 'Priority') }}
			{{ Form::text('priority', Request::old('priority'), array('class' => 'form-control' . ($errors->has('priority') ? ' is-invalid' : ''))) }}
			@if ($errors->has('priority'))
				<span class="help-block invalid-feedback">
			      <strong>{{ $errors->first('priority') }}</strong>
				</span>
			@endif
		</div>
		
		<div class="form-group">
			{{ Form::label('status_id', 'Status') }}
			{{ Form::select('status_id', $statuses, Request::old('status_id'), array('class' => 'form-control' . ($errors->has('status_id') ? ' is-invalid' : ''))) }}
			@if ($errors->has('status_id'))
				<span class="help-block invalid-feedback">
			      <strong>{{ $errors->first('status_id') }}</strong>
				</span>
			@endif
		</div>
		
		<div class="form-group">
			{{ Form::label('responsible_person_id', 'Responsible Person') }}
			{{ Form::select('responsible_person_id', $users, Request::old('responsible_person_id'), array('class' => 'form-control' . ($errors->has('responsible_person_id') ? ' is-invalid' : ''))) }}
			@if ($errors->has('responsible_person_id'))
				<span class="help-block invalid-feedback">
			      <strong>{{ $errors->first('responsible_person_id') }}</strong>
				</span>
			@endif
		</div>
		
		{{ Form::submit('Create the Task!', array('class' => 'btn btn-primary')) }}
		
		{!! Form::close() !!}

	</div>
	
@endsection