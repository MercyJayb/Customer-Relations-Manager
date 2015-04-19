@extends('template')


@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
			@endif
		</p>


<table data-order='[[ 0, "desc" ]]' data-page-length='25' class="table table-striped table-bordered table-hover" id="example" >
	<thead>
		<tr>
			<th class="center">#</th>
			<th>Project Title</th>
			<th>Client</th>
			<th>Tech</th>
			<th class="hidden-xs">Start At</th>
			<th class="hidden-xs">End At</th>
			<th>Priority</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($projects as $project)
		<tr>
			<td class="center">{{ $project->id }}</td>
			<td class="hidden-xs"><a href="{{ URL::to('projects/'.$project->id) }}">{{ str_limit($project->title, $limit = 30, $end = '...') }}</a></td>
			<td>{{ $project->client->clientname }}</td>
			<td>{{ $project->tech->username }}</td>
			<td>{{ str_limit($project->start_at, $limit = 10, $end = "") }}</td>
			<td>{{ str_limit($project->end_at, $limit = 10, $end = "") }}</td>
			<td>
				<span class="label {{ $project->priority->class_name }}">
					{{ $project->priority->priority_name }}
				</span>
			</td>
			<td class="center">
				<div class="visible-md visible-lg hidden-sm hidden-xs">
					<a href="{{ URL::to('projects/'.$project->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
				</div>
			</td>
			<td>
				{{ Form::open(array('style'=>'margin: 0px;', 'method'=>'delete','action'=> array('ProjectController@destroy',$project->id))) }}
				 	<button class = 'btn btn-danger btn-xs' type="submit"  >Delete</button>                      
				{{Form::close()}}   
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
