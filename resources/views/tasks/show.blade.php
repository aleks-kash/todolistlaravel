@extends('tasks._layout')

@section('content')
	
	<style>
		.font-size-lg{
			font-size: 1.5em;
		}
	</style>
	
	<div class="container">
		<h1>Showing Task: {{ $task->title }}</h1>
		
		<div class="jumbotron font-size-lg">
			<div class="row">
				<div class="col-md-4 order-md-2 mt-lg-5">
					
					<ul class="list-group mb-3">
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<h6 class="my-0 mt-1">Responsible Person</h6>
							<small class="text-muted">{{ $task->responsiblePerson->name }}</small>
						</li>
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<h6 class="my-0 mt-1">Created At</h6>
							<small class="text-muted">{{ $task->created_at }}</small>
						</li>
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<h6 class="my-0 mt-1">Updated At</h6>
							<small class="text-muted">{{ $task->updated_at }}</small>
						</li>
					</ul>
					
				</div>
				<div class="col-md-8 order-md-1">
				
						<div class="row">
							<div class="col-md-4 ">
								<label class="font-weight-bold">Task slug</label>
							</div>
							<div class="col-md-8 ">
								<div class="">
									{{ $task->slug ?? '-' }}
								</div>
							</div>
						</div>
				
					<hr align="center"  size="2" color="#ffb5b5"/>
				
						<div class="row">
							<div class="col-md-4 ">
								<label class="font-weight-bold">Body</label>
							</div>
							<div class="col-md-8 ">
								<div class="">
									{{ $task->body }}
								</div>
							</div>
						</div>
			
					<hr align="center"  size="2" color="#ffb5b5"/>
				
						<div class="row">
							<div class="col-md-4 ">
								<label class="font-weight-bold">Priority</label>
							</div>
							<div class="col-md-8 ">
								<div class="">
									{{ $task->priority }}
								</div>
							</div>
						</div>
				
					<hr align="center"  size="2" color="#ffb5b5"/>
					
						<div class="row">
							<div class="col-md-4 ">
								<label class="font-weight-bold">Status</label>
							</div>
							<div class="col-md-8 ">
								<div class="">
									{{ $task->status->name }}
								</div>
							</div>
						</div>
					
				</div>
			</div>
		
		
		</div>
	</div>

@endsection
