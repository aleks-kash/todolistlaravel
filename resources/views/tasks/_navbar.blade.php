<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('tasks') }}">Task Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('tasks') }}">View All Tasks</a></li>
		<li><a href="{{ URL::to('tasks/create') }}">Create new Task</a>
	</ul>
</nav>
