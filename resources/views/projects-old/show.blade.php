@extends('template')


@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
			@endif
		</p>
	
<table class="table table-hover" id="sample-table-1">
	<thead>
		<tr>
			<th class="center">#</th>
			<th>Project Name</th>
			<th>Project Description</th>
			<th class="hidden-xs">Start At</th>
			<th class="hidden-xs">End At</th>
			<th>Priority</th>
			
		</tr>
	</thead>
	<tbody>

		<tr>
			<td class="center">{{ $project->id }}</td>
			<td class="hidden-xs">{{ $project->title }}</td>
			<td class="hidden-xs">{{ $project->description }}</td>
			<td>{{ $project->start_at }}</td>
			<td>{{ $project->end_at }}</td>
			<td>
				<span class="label {{ $project->priority->class_name }}">
					{{ $project->priority->priority_name }}
				</span>
			</td>
			
		</tr>
	
		
	</tbody>
</table>


@stop