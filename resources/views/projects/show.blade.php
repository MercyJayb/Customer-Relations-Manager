@extends('template')


@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
			@endif
		</p>

        <div class="row">
            <div class="col-sm-8">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Project Details</h3>
                    </div>
                    <div class="panel-body">
                        <p><b>Project Name:</b> {{ $project->title }}</p>
                        <p><b>Client Name:</b> {{ $project->client->fullname }}</p>
                        <p>Status:
                            @if($project->status == TRUE)
                                <span class="label label-success">COMPLETED</span>
                            @else
                                <span class="label label-warning">PENDING</span>
                            @endif
                            <a href="{{ URL::to('projects-update-status/'.$project->id)  }}"><i class="ti-reload"></i></a>
                        </p>
                        <p>Start Date: {{ $project->start_at->format('Y-m-d') }}</p>
                        <p>End Date: {{ $project->end_at->format('Y-m-d') }}</p>

                        <p>Created On: {{ $project->created_at }}</p>
                        <p>Last Updated On: {{ $project->updated_at }}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 pull-right">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Action Table</h3>
                    </div>
                    <div class="panel-body">

                        <p><a href="{{ url('projects/'.$project->id.'/edit') }}"> <i class="ti-pencil-alt"></i> Update Project</a></p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Description</h3>
                    </div>
                    <div class="panel-body">

                        <p>{{ $project->description }}</p>

                    </div>
                </div>
            </div>

        </div>

@stop