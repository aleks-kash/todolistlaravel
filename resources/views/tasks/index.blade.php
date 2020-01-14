@extends('tasks._layout')

@section('title')
	Look! I'm CRUDding
@endsection

@section('content')
	
	<style>
		.row_table {
			color: black;
			font-size: 1.2em;
			border: 5px solid rgba(154, 151, 151, 0.34);
			border-radius: 10px;
			padding: 15px;
			text-align: center;
			font-family: sans-serif;
		}
		
		.row_table:nth-of-type(1) {
			border-bottom: 2.5px solid rgba(154, 151, 151, 0.34);
		}
		
		.row_table:nth-of-type(2){
			border-top: 2.5px solid rgba(154, 151, 151, 0.34);
			background: #eee;
		}
		
		.f_btn_action {
			float: left;
			margin-right: 3px;
			color: white;
			width: 40px;
			height: 40px;
		}
		
		.f_btn_action_block {
			position: relative;
			padding-top: 15px;
			margin-left: -90px;
			left: 50%;
		}
		
		form.f_btn_action {
			margin-left: 5px;
		}
		
		.nav_paginator {
			position: relative;
			top: 30px;
			display: flex;
			justify-content: center;
		}
		
		.ui-sortable-handle.ui-sortable-helper, .ui-sortable-handle.ui-sortable-helper * {
			cursor: move !important;
		}
		
		.ui-sortable-handle.ui-sortable-helper {
			position: absolute;
			opacity: 0.5;
			z-index: 2000;
			background: rgb(52, 69, 238);
		}
		
		.ui-sortable-handle {
			position: relative;
			
		}
		
		.ui-sortable-handle:before {
			position: absolute;
		}
		
		.tasksContainer.row_table .row{
			background: rgb(238, 238, 238);
			border-radius: 10px;
		}
		
		.tasksContainer.row_table .row.ui-sortable-helper{
			background: rgb(151, 151, 151);
			border: 3px dashed #aaa;
		}
		
		.ui-sortable-placeholder {
			border: 3px dashed #aaa;
			height: 102px;
			width: cals(100% - 12px);
			background: #ccc;
		}
		
		.sortContainer i.icon-move{
			cursor: all-scroll;
		}
		
		i.icon-move{
			border: 3px solid rgba(0, 0, 0, 0.54);
			padding: 3px;
			border-radius: 5px;
		}
	</style>
	
	<h1>All Tasks</h1>
	
	@if (Session::has('message'))
		<p class="alert alert-info">{{ Session::get('message') }}</p>
	@endif
	
	<div class="row_table">
		{{ Form::model($taskModel, array(
			'url'       => 'tasks',
			'class'     => 'pull-right',
			'method'    => 'GET'
		)) }}
		
			<div class="row align-items-center">
				<div class="col-sm-1"></div>
				<div class="col-sm-1">{{ Form::text('priority', Request::old('priority'), array('class' => 'form-control')) }}</div>
				<div class="col-sm-1">{{ Form::text('status', Request::old('status'), array('class' => 'form-control')) }}</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2">{{ Form::text('person', Request::old('person'), array('class' => 'form-control')) }}</div>
				<div class="col-sm-1"></div>
				<div class="col-sm-2">
					{{ Form::submit('Search', array('class' => 'btn btn-success')) }}
				</div>
			</div>
		{{ Form::close() }}
		<hr align="center"  size="2" color="#ffb5b5"/>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-1">priority</div>
			<div class="col-sm-1">status</div>
			<div class="col-sm-2">title</div>
			<div class="col-sm-2">body</div>
			<div class="col-sm-2">Responsible Person</div>
			<div class="col-sm-1">updated_at</div>
			<div class="col-sm-2">actions</div>
		</div>
	</div>
	<div class="tasksContainer row_table">
		@foreach($tasks as $key => $task)
			<div class="row align-items-center">
				<div class="col-sm-1"><i class="icon-move">{{ ++$key + $rowStart}}</i></div>
				<div class="col-sm-1">{{ $task->priority }}</div>
				<div class="col-sm-1">{{ $task->status->name }}</div>
				<div class="col-sm-2">{{ $task->title }}</div>
				<div class="col-sm-2">{{ Str::limit($task->body, 50, ' (...)') }}</div>
				<div class="col-sm-2">{{ $task->responsiblePerson->name}}</div>
				<div class="col-sm-1">{{ $task->updated_at }}</div>
				<div class="col-sm-2">
					<div class="f_btn_action_block">
						
						<a class="btn f_btn_action" href="{{ URL::to('tasks/' . $task->id) }}" title="Show" style="
						    padding: 0;
						    margin: 0;
						    margin-top: -1px;
						">
							<button style="color: #0012c4;" title="Show">
								<svg class="bi bi-document-text" width="1.6em" height="2em" viewBox="0 0 20 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M6 3h8a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2zm0 1a1 1 0 00-1 1v10a1 1 0 001 1h8a1 1 0 001-1V5a1 1 0 00-1-1H6z" clip-rule="evenodd"></path>
									<path fill-rule="evenodd" d="M6.5 14a.5.5 0 01.5-.5h3a.5.5 0 010 1H7a.5.5 0 01-.5-.5zm0-2a.5.5 0 01.5-.5h6a.5.5 0 010 1H7a.5.5 0 01-.5-.5zm0-2a.5.5 0 01.5-.5h6a.5.5 0 010 1H7a.5.5 0 01-.5-.5zm0-2a.5.5 0 01.5-.5h6a.5.5 0 010 1H7a.5.5 0 01-.5-.5zm0-2a.5.5 0 01.5-.5h6a.5.5 0 010 1H7a.5.5 0 01-.5-.5z" clip-rule="evenodd"></path>
								</svg>
							</button>
						</a>
						
						<a class="btn f_btn_action" href="{{ URL::to('tasks/' . $task->id . '/edit') }}" title="Edit" style="
						    padding: 0;
						    margin: 0;
						    margin-top: -1px;
						    margin-left: 5px;
						">
							<button style="color: #2c9013;" title="Edit">
								<svg class="bi bi-pencil" width="1.6em" height="2em" viewBox="0 2 20 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
									<path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"></path>
								</svg>
							</button>
						</a>
						
						{{ Form::open(array('url' => 'tasks/' . $task->id,
							'class' => 'pull-right f_btn_action',
							'onsubmit' => 'return confirm("Are You Sure to delete this Task?");'
						)) }}
							{{ Form::hidden('_method', 'DELETE') }}
							<button type="submit" style="color: #d02121;" title="Delete">
								<svg class="bi bi-trash" width="1.5em" height="1.5em" viewBox="0 2 20 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path d="M7.5 7.5A.5.5 0 018 8v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V8z"></path>
									<path fill-rule="evenodd" d="M16.5 5a1 1 0 01-1 1H15v9a2 2 0 01-2 2H7a2 2 0 01-2-2V6h-.5a1 1 0 01-1-1V4a1 1 0 011-1H8a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM6.118 6L6 6.059V15a1 1 0 001 1h6a1 1 0 001-1V6.059L13.882 6H6.118zM4.5 5V4h11v1h-11z" clip-rule="evenodd"></path>
								</svg>
							</button>
						{{ Form::close() }}
					</div>
				</div>
				<div class="col-sm-12"><hr align="center"  size="2" color="#ffb5b5"/></div>
			</div>
		@endforeach
	</div>
	
	<div class="nav_paginator">
		{{ $tasks->render() }}
	</div>

@endsection
