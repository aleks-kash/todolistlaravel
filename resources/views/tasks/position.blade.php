@extends('tasks._layout')

@section('title')
	Look! I'm CRUDding
@endsection

@section('content')
	
	@push('scripts')
		<script type="text/javascript">

            document.addEventListener('DOMContentLoaded', function(){
                $(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('.sortContainer').sortable({
                        placeholder: 'ui-sortable-placeholder',
                        revert: true,
                        scroll: false,
                        opacity: true,
                        // handle: 'i.icon-move',

                        update: function ($item, container, _super, event) {

	                        $($item.target.children).each(function (index) {
                                if ($(this).data('position') != (index + 1)) {
                                    $(this).data('position', index + 1).addClass('updated');
                                    $(this).children('div').children('.icon-move').text(index + 1);
                                }
                            });
                            
	                        saveNewPositions();
                        }
                    });
                    
                    
                    function saveNewPositions() {
	                    var positions = [];
	                    $('.updated').each(function () {
		                    positions.push([
                                $(this).data('index'),
                                $(this).data('position')
		                    ]);
		                    $(this).removeClass('updated');
                        });

                        $.post('{{ URL::route('updateTasksPosition') }}', {
                            update: 1,
	                        positions: positions
                        }, function (response) {
                            console.log(response);
                        });
                    }
            });
            

            });
		</script>
	@endpush
	
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
		}
		
		.f_btn_action_block {
			position: relative;
			padding-top: 15px;
			margin-left: -90px;
			left: 50%;
		}
		
		form.f_btn_action {
			margin-left: 10px;
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
		
		.sortContainer.row_table .row{
			background: rgb(238, 238, 238);
			border-radius: 10px;
		}
		
		.sortContainer.row_table .row.ui-sortable-helper{
			background: rgb(151, 151, 151);
			border: 3px dashed #aaa;
		}
		
		.ui-sortable-placeholder {
			border: 3px dashed #aaa;
			height: 102px;
			width: cals(100% - 12px);
			background: #ccc;
		}
		
		i.icon-move{
			border: 3px solid rgba(0, 0, 0, 0.54);
			padding: 3px;
			border-radius: 5px;
			cursor: all-scroll;
		}
	</style>
	
	<h1>All Tasks</h1>
	
	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	
	<div class="row_table">
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
	<div class="sortContainer tasksContainer row_table">
		@foreach($tasks as $key => $task)
			<div class="row align-items-center" data-index="{{ $task->id }}" data-position="{{ $task->position }}">
				<div class="col-sm-1"><i class="icon-move">{{ ++$key }}</i></div>
				<div class="col-sm-1">{{ $task->priority }}</div>
				<div class="col-sm-1">{{ $task->status_id }}</div>
				<div class="col-sm-2">{{ $task->title }}</div>
				<div class="col-sm-2">{{ Str::limit($task->body, 50, ' (...)') }}</div>
				<div class="col-sm-2">{{ $task->responsible_person_id}}</div>
				<div class="col-sm-1">{{ (new DateTime($task->updated_at))->format('y-m-d H:i') }}</div>
				<div class="col-sm-2">
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

@endsection
