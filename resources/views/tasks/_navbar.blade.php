<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('tasks') }}">Task Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li>
			<a href="{{ URL::to('tasks') }}" class="btn btn-toolbar badge-light">
				View All Tasks
			</a>
		</li>
		<li>
			<a href="{{ URL::to('tasks/create') }}" class="btn btn-toolbar badge-light">
				Create new Task
			</a>
		</li>
		<li>
			<a href="{{ URL::to('tasks/position') }}" class="btn btn-toolbar badge-light">
				Change position Tasks
			</a>
		</li>
	</ul>
</nav>
