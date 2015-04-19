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
			<th class="hidden-xs">Domain Name</th>
			<th class="hidden-xs">Client</th>
			<th>Start Date</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td class="center">{{ $domain->id }}</td>
			<td class="hidden-xs">{{ $domain->domain }}</td>
			<td>{{ $domain->client_id }}</td>
			<td>{{ $domain->start_date }}</td>
			<td>{{ $domain->email }}</td>
		</tr>
	
	</tbody>
</table>

@stop