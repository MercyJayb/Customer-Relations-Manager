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
			<th>Company Name</th>
			<th class="hidden-xs">Slogan</th>
			<th class="hidden-xs">Email</th>
			<th>Address</th>
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td class="center">{{ $settings->id }}</td>
			<td class="hidden-xs">{{ $settings->company }}</td>
			<td>{{ $settings->slogan }}</td>
			<td>{{ $settings->email }}</td>
			<td>{{ $settings->address }}</td>
		</tr>
	
		
	</tbody>
</table>

{{ HTML::image('uploads/'.$settings->logo,'Logo') }}

@stop