@extends('tasks._layout')

@section('title')
	Look! I'm CRUDding
@endsection

@section('content')

	{{--<div class="flex-center position-ref full-height">--}}
		{{--<ul>--}}
{{--@foreach($tasks ?? array() as $task)--}}
			{{--<li>{{ $task->body }}</li>--}}
{{--@endforeach--}}
		{{--</ul>--}}
	{{--</div>--}}
	
	
	@push('scripts')
		<script type="text/javascript">
            $(function() {

                $('#sortContainer').sortable();

            });
		</script>
	@endpush
	
	<style>
		.row_table{
			color: black;
			font-size: 1.2em;
			border: 5px solid rgba(154, 151, 151, 0.34);
			border-radius: 10px;
			padding: 15px;
			text-align: center;
		}
		
		.row_table:nth-of-type(1){
			border-bottom: 2.5px solid rgba(154, 151, 151, 0.34);
		}
		
		.row_table:nth-of-type(2){
			border-top: 2.5px solid rgba(154, 151, 151, 0.34);
		}
		
		.f_btn_action{
			 float: left;
			 margin-right: 3px;
		}
		
		.f_btn_action_block{
			position: relative;
			padding-top: 15px;
			margin-left: -90px;
			left: 50%;
			
		}
		
		form.f_btn_action{
			margin-left: 10px;
		}
		
		.nav_paginator{
			/* display: block; */
			/* margin-left: auto; */
			/* margin-right: auto; */
			position: relative;
			/* width: 0; */
			/* margin: 30px 0 0 -8%; */
			/* left: 50%; */
			/* margin-right: -50%; */
			/* left: 50%; */
			/* margin-right: -50%; */
			/* transform: translate(45%, 74%); */
			/* position: fixed; */
			top: 30px;
			/* left: 0; */
			display: flex;
			/* align-items: center; */
			/* align-content: center; */
			justify-content: center;
		}
	</style>
	
	
	<h1>All Tasks</h1>
	
	<!-- will be used to show any messages -->
	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	
	{{--<table class="table table-striped table-bordered">--}}
		{{--<thead>--}}
			{{--<tr>--}}
				{{--<th scope="col">priority</th>--}}
				{{--<th scope="col">title</th>--}}
				{{--<th scope="col">body</th>--}}
				{{--<th scope="col">status</th>--}}
				{{--<th scope="col">responsible person</th>--}}
				{{--<th scope="col">updated_at</th>--}}
				{{--<th scope="col">actions</th>--}}
			{{--</tr>--}}
		{{--</thead>--}}
		{{--<tbody>--}}
		{{----}}
		{{--@foreach($tasks as $key => $task)--}}
			{{--@dd($task->updated_at)--}}
			{{--<tr>--}}
				{{--<td>{{ $task->priority }}</td>--}}
				{{--<td>{{ $task->title }}</td>--}}
				{{--<td>{{ $task->body }}</td>--}}
				{{--<td>{{ $task->status_id }}</td>--}}
				{{--<td>{{ $task->responsible_person_id}}</td>--}}
				{{--<td>{{ $task->updated_at }}</td>--}}
				{{----}}
				{{----}}
		{{--// status_id,--}}
        {{--$table->text('status_id');--}}
        {{--// responsible_person_id--}}
        {{--$table->text('responsible_person_id');--}}
        {{--// title,--}}
        {{--$table->text('title');--}}
        {{--//--}}
        {{--//--}}
        {{--//--}}
        {{--$table->text('body');// body,--}}
        {{--//--}}
        {{--//--}}
        {{--//--}}

        {{--// priority,--}}
        {{--$table->text('priority');--}}
        {{--// updated_at--}}
{{--//            $table->text('updated_at');--}}
{{----}}
				{{----}}
				{{--<!-- we will also add show, edit, and delete buttons -->--}}
				{{--<td>--}}
					{{----}}
					{{--<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->--}}
					{{--<!-- we will add this later since its a little more complicated than the other two buttons -->--}}
					{{--{{ Form::open(array('url' => 'tasks/' . $task->id,--}}
						{{--'class' => 'pull-right',--}}
						{{--'onsubmit' => 'return confirm("Are You Sure to delete this Task?");'--}}
					{{--)) }}--}}
						{{--{{ Form::hidden('_method', 'DELETE') }}--}}
						{{--{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}--}}
					{{--{{ Form::close() }}--}}
					{{----}}
					{{--<!-- show the nerd (uses the show method found at GET /nerds/{id} -->--}}
					{{--<a class="btn btn-small btn-success" href="{{ URL::to('tasks/' . $task->id) }}">Show</a>--}}
					{{----}}
					{{--<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->--}}
					{{--<a class="btn btn-small btn-info" href="{{ URL::to('tasks/' . $task->id . '/edit') }}">Edit</a>--}}
					{{----}}
					{{--<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->--}}
					{{--<!-- we will add this later since its a little more complicated than the other two buttons -->--}}
					{{--<a class="btn btn-small btn-danger" href="$">DELETE</a>--}}
				{{----}}
				{{--</td>--}}
			{{--</tr>--}}
		{{--@endforeach--}}
		{{--</tbody>--}}
	{{--</table>--}}
	
	
	<div class="row_table">
			{{ Form::model($task, array(
				'url'       => 'tasks/',
				'class'     => 'pull-right',
				'method'    => 'GET'
			)) }}
{{--			{{ Form::hidden('_method', 'PUT') }}--}}
{{--		{{ method_field('PUT') }}--}}
			<div class="row align-items-center">
				<div class="col-sm-1"></div>
				<div class="col-sm-1">{{ Form::text('priority', Request::old('priority'), array('class' => 'form-control')) }}</div>
				<div class="col-sm-1">{{ Form::text('status', Request::old('status'), array('class' => 'form-control')) }}</div>
				<div class="col-sm-1"></div>
				<div class="col-sm-1"></div>
				<div class="col-sm-2">{{ Form::text('person', Request::old('person'), array('class' => 'form-control')) }}</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-3">
					{{ Form::submit('Search', array('class' => 'btn btn-success')) }}
				</div>
			</div>
		{{ Form::close() }}
		<hr align="center"  size="2" color="#ffb5b5"/>
		<div class="row">
			<div class="col-sm-1">№</div>
			<div class="col-sm-1">priority</div>
			<div class="col-sm-1">status</div>
			<div class="col-sm-1">title</div>
			<div class="col-sm-1">body</div>
			<div class="col-sm-2">Responsible Person</div>
			<div class="col-sm-2">updated_at</div>
			<div class="col-sm-3">actions</div>
		</div>
	</div>
	<div id="sortContainer" class="row_table">
		@foreach($tasks as $key => $task)
			<div class="row align-items-center">
				<div class="col-sm-1">{{ ++$loop->index }}</div>
				<div class="col-sm-1">{{ $task->priority }}</div>
				<div class="col-sm-1">{{ $task->status_id }}</div>
				<div class="col-sm-1">{{ $task->title }}</div>
				<div class="col-sm-1">{{ $task->body }}</div>
				<div class="col-sm-2">{{ $task->responsible_person_id}}</div>
				<div class="col-sm-2">{{ $task->updated_at }}</div>
				<div class="col-sm-3">
					<div class="f_btn_action_block">
						<a class="btn btn-small btn-success f_btn_action" href="{{ URL::to('tasks/' . $task->id) }}">Show</a>
						<a class="btn btn-small btn-info f_btn_action" href="{{ URL::to('tasks/' . $task->id . '/edit') }}">Edit</a>
						{{ Form::open(array('url' => 'tasks/' . $task->id,
							'class' => 'pull-right f_btn_action',
							'onsubmit' => 'return confirm("Are You Sure to delete this Task?");'
						)) }}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
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
	
	
{{--	{!! $tasks->links() !!}--}}
	
	{{--<div id="DeleteModal" class="modal fade text-danger" role="dialog">--}}
		{{--<div class="modal-dialog ">--}}
			{{--<!-- Modal content-->--}}
			{{--{{ Form::open(array('url' => 'tasks/' . $task->id, 'class' => 'pull-right')) }}--}}
				{{--<div class="modal-content">--}}
					{{--<div class="modal-header bg-danger">--}}
						{{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
						{{--<h4 class="modal-title text-center">DELETE CONFIRMATION</h4>--}}
					{{--</div>--}}
					{{--<div class="modal-body">--}}
{{--						{{ csrf_field() }}--}}
						{{--{{ method_field('DELETE') }}--}}
						{{--<p class="text-center">Are You Sure Want To Delete ?</p>--}}
					{{--</div>--}}
					{{--<div class="modal-footer">--}}
						{{--<center>--}}
							{{--<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>--}}
							{{--<button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>--}}
						{{--</center>--}}
					{{--</div>--}}
				{{--</div>--}}
			{{--{{ Form::close() }}--}}
		{{--</div>--}}
	{{--</div>--}}
	
	

@endsection
