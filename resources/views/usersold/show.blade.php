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
			<th>Full Name</th>
			<th class="hidden-xs">Email</th>
			<th class="hidden-xs">Phone Number</th>
			<th>Level</th>
			
		</tr>
	</thead>
	<tbody>
	
		<tr>
			<td class="center">{{ $user->id }}</td>
			<td class="hidden-xs"><a href="{{ URL::to('users/'.$user->id) }}">{{ $user->firstname.' '.$user->lastname }}</a></td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->phone }}</td>
			<td>
				<span class="label @if(Auth::user()->level_id == 1) {{'label-success'}} @elseif(Auth::user()->level_id == 2) {{'label-info'}} @else {{'label-warning'}} @endif }}">
					{{ Auth::user()->level->level_name }}
				</span>
			</td>
			
		</tr>

		
	</tbody>
</table>

@stop