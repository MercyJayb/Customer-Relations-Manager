@extends('template')


@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
			@endif
		</p>
	

<table style="font-size: 11px;" class="table table-hover" id="sample-table-1">
	<thead>
		<tr>
			<th class="center">#</th>
			<th class="hidden-xs">Name</th>
			<th class="hidden-xs">Email</th>
			<th>Mobile Number</th>
			<th>Level</th>
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td class="center">{{ $user->id }}</td>
			<td class="hidden-xs">{{ $user->company }}</td>
			<td>{{ $user->firstname." ".$user->lastname }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->phone }}</td>
			
			<td class="hidden-xs">{{ $user->address }}</td>
		</tr>
	
		
	</tbody>
</table>

@stop