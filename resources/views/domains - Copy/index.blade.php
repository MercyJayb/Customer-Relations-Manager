@extends('template')

@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
			@endif
		</p>
		
<table data-order='[[ 0, "desc" ]]' data-page-length='10' class="table table-striped table-bordered table-hover" id="example" >
	<thead>
		<tr>
			<th class="center">#</th>
			<th class="hidden-xs">Client</th>
			<th class="hidden-xs">Domain</th>
			<th>Start Date</th>
			<th>Email</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	
		@foreach($domains as $domain)
		<tr>
			<td class="center">{{ $domain->id }}</td>
			<td>{{ $domain->client_id }}</td>
			<td>{{ $domain->domain }}</td>
			<td>{{ $domain->start_date }}</td>
			<td>{{ $domain->email }}</td>
			<td class="center">
				<div class="visible-md visible-lg hidden-sm hidden-xs">
					<a href="{{ URL::to('domains/'.$domain->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
				</div>
			</td>
			<td>
				{!! Form::model($domain ,array('style'=>'margin: 0px;', 'action'=> array('DomainController@destroy',$domain->id))) !!}
				 	<button class = 'btn btn-danger btn-xs' type="submit"  >Delete</button> 
				 	{!! Form::hidden('_method', 'DELETE') !!}                     
				{!!Form::close()!!}   
			</td>
		</tr>
		@endforeach

	
	</tbody>
</table>




@stop



@section('dataTablesjs')


	<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/media/blog/bootstrap_2/DT_bootstrap.js"></script>
@stop


