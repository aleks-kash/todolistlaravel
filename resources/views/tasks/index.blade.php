@extends('tasks._layout')

@section('title')
	Look! I'm CRUDding
@endsection

@section('content')
	
	@push('scripts')
		<script type="text/javascript">
            $(function() {

                $('.sortContainer').sortable({
                    placeholder: 'ui-sortable-placeholder',
	                // group: 'sortContainer',
	                // pullPlaceholder: false,
	                // onDrop: function () {
                    //     console.log('onDrop');
                    //     // var $clonedItem = $('<div/>').css({height: 0});
                    //     // item.before($clonedItem);
                    //     // $clonedItem.animate({'height': $item.height()});
					// 	//
	                //     // $item.animate($clonedItem.position(), function () {
		            //     //     $clonedItem.detach();
		            //     //     _super(item, conteiner);
                    //     // });
	                // },
	                //
	                // onDragStart: function () {
                    //     console.log('onDragStart');
                    // },
	                //
                    // onDrag: function () {
                    //     console.log('onDrag');
                    // },
	                // onDragStart: function ($item, container, _super, event) {
		            //     console.log('ghdfhgfhfgh')
                    // }

                    // appendTo: "parent",
                    // axis: false,
                    // connectWith: false,
                    // containment: false,
                    // cursor: "auto",
                    // cursorAt: false,
                    // dropOnEmpty: true,
                    // forcePlaceholderSize: false,
                    // forceHelperSize: false,
                    // grid: false,
                    // handle: false,
                    // helper: "original",
                    // items: "> *",
                    // opacity: false,
                    
                    // revert: false,
                    // scroll: true,
                    // scrollSensitivity: 20,
                    // scrollSpeed: 20,
                    // scope: "default",
                    // tolerance: "intersect",
                    // zIndex: 1000,
	                

                    // activate: function () {
	                //     console.log('--- activate');
                    // },
                    // beforeStop: function () {
                    //     console.log('--- beforeStop');
                    // },
                    // change: function () {
                    //     console.log('--- change');
                    // },
                    // deactivate: function () {
                    //     console.log('--- deactivate');
                    // },
                    // out: function () {
                    //     console.log('--- out');
                    // },
                    // over: function () {
                    //     console.log('--- over');
                    // },
                    // receive: function () {
                    //     console.log('--- receive');
                    // },
                    // remove: function () {
                    //     console.log('--- remove');
                    // },
                    // sort: function () {
                    //     console.log('--- sort');
                    // },
                    // start: function () {
                    //     console.log('--- start');
                    // },
                    // stop: function () {
                    //     console.log('--- stop');
                    // },
                    update: function ($item, container, _super, event) {
                        console.log('--- update');
                        console.log('item', $item);
                        console.log('container', container);
                        console.log('_super', _super);
                        console.log('event', event);
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
		
		.sortContainer.row_table .row.ui-sortable-handle.ui-sortable-helper{
			background: rgb(112, 112, 112);
		}
		
		.ui-sortable-placeholder {
			border: 3px dashed #aaa;
			height: 102px;
			width: cals(100% - 12px);
			background: #ccc;
		}
		
	</style>
	
	<h1>All Tasks</h1>
	
	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	
	<div class="row_table">
			{{ Form::model($task, array(
				'url'       => 'tasks/',
				'class'     => 'pull-right',
				'method'    => 'GET'
			)) }}

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
	<div class="sortContainer row_table">
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

@endsection
