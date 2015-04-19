@extends('template')


@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
			@endif
		</p>
        <div class="panel panel-white">

            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example" >
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th class="hidden-xs">Title</th>
                            <th>Client Name</th>
                            <th>Start At</th>
                            <th class="hidden-xs">End At</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($projects as $project)
                        <tr>
                            <td class="center">{{ $project->id }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('projects/'.$project->id)}}">{{ $project->title }}</a></td>
                            <td class="hidden-xs">{{ $project->client->fullname }}</td>
                            <td>{{ $project->start_at->format('D d M, Y') }}</td>
                            <td>{{ $project->end_at->format('D d M, Y') }}</td>
                            <td>
                                @if($project->status == TRUE)
                                    <span class="label label-success">COMPLETED</span>
                                @else
                                    <span class="label label-warning">PENDING</span>
                                @endif
                                <a href="{{ URL::to('projects-update-status/'.$project->id)  }}"><i class="ti-reload"></i></a>
                            </td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('projects/'.$project->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>

                            <td>
                                {!! Form::model($project ,array('style'=>'margin: 0px;', 'action'=> array('ProjectController@destroy',$project->id))) !!}
                                    <button class = 'btn btn-danger btn-xs' type="submit"  >Delete</button>
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

@stop

@section('dataTablesjs')
	<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/media/blog/bootstrap_2/DT_bootstrap.js"></script>
@stop


