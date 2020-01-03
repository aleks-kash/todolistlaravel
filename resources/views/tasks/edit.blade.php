@extends('tasks._layout')

@section('content')
	
	<h1>Edit {{ $task->name }}</h1>
	
	@if($errors->any())
		<div class="row justify-content-center">
			<div class="col-md-11">
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					{{ $errors->first() }}
				</div>
			</div>
		</div>
	@endif

	{{ Form::model($task, array('route' => array('tasks.update', $task->id), 'method' => 'PUT')) }}
	
	<div class="form-group">
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', null, array('class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''))) }}
		@if ($errors->has('title'))
			<span class="help-block invalid-feedback">
		      <strong>{{ $errors->first('title') }}</strong>
			</span>
		@endif
	</div>
	
	<div class="form-group">
		{{ Form::label('body', 'Body') }}
		{{ Form::text('body', null, array('class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''))) }}
		@if ($errors->has('body'))
			<span class="help-block invalid-feedback">
		      <strong>{{ $errors->first('body') }}</strong>
			</span>
		@endif
	</div>
	
	<div class="form-group">
		{{ Form::label('priority', 'Priority') }}
		{{ Form::text('priority', null, array('class' => 'form-control' . ($errors->has('priority') ? ' is-invalid' : ''))) }}
		@if ($errors->has('priority'))
			<span class="help-block invalid-feedback">
		      <strong>{{ $errors->first('priority') }}</strong>
			</span>
		@endif
	</div>
	
	<div class="form-group">
		{{ Form::label('status_id', 'Status') }}
		{{ Form::text('status_id', null, array('class' => 'form-control' . ($errors->has('status_id') ? ' is-invalid' : ''))) }}
		@if ($errors->has('status_id'))
			<span class="help-block invalid-feedback">
		      <strong>{{ $errors->first('status_id') }}</strong>
			</span>
		@endif
	</div>
	
	<div class="form-group">
		{{ Form::label('responsible_person_id', 'Responsible Person') }}
		{{ Form::text('responsible_person_id', null, array('class' => 'form-control' . ($errors->has('responsible_person_id') ? ' is-invalid' : ''))) }}
		@if ($errors->has('responsible_person_id'))
			<span class="help-block invalid-feedback">
		      <strong>{{ $errors->first('responsible_person_id') }}</strong>
			</span>
		@endif
	</div>
	
	{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
	
	{{ Form::close() }}

@endsection
