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
	
	
	<h1>All Tasks</h1>
	
	<!-- will be used to show any messages -->
	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	
	<table class="table table-striped table-bordered">
		<thead>
		<tr>
			<td>title</td>
			<td>body</td>
			<td>priority</td>
			<td>status_id Level</td>
			<td>responsible_person_id</td>
			<td>updated_at</td>
			<td>actions</td>
		</tr>
		</thead>
		<tbody id="sortContainer">
		
		@foreach($tasks as $key => $task)
			{{--@dd($task->updated_at)--}}
			<tr>
				<td>{{ $task->title }}</td>
				<td>{{ $task->body }}</td>
				<td>{{ $task->priority }}</td>
				<td>{{ $task->status_id }}</td>
				<td>{{ $task->responsible_person_id}}</td>
				<td>{{ $task->updated_at }}</td>
				
				{{--
		// status_id,
        $table->text('status_id');
        // responsible_person_id
        $table->text('responsible_person_id');
        // title,
        $table->text('title');
        //
        //
        //
        $table->text('body');// body,
        //
        //
        //

        // priority,
        $table->text('priority');
        // updated_at
//            $table->text('updated_at');
--}}
				
				<!-- we will also add show, edit, and delete buttons -->
				<td>
					
					<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
					<!-- we will add this later since its a little more complicated than the other two buttons -->
					{{ Form::open(array('url' => 'tasks/' . $task->id,
						'class' => 'pull-right',
						'onsubmit' => 'return confirm("Are You Sure to delete this Task?");'
					)) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
					
					<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
					<a class="btn btn-small btn-success" href="{{ URL::to('tasks/' . $task->id) }}">Show</a>
					
					<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
					<a class="btn btn-small btn-info" href="{{ URL::to('tasks/' . $task->id . '/edit') }}">Edit</a>
					
					<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
					<!-- we will add this later since its a little more complicated than the other two buttons -->
					{{--<a class="btn btn-small btn-danger" href="$">DELETE</a>--}}
				
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	
	
	
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
