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
                        <h3 class="panel-title">Task Details</h3>
                    </div>
                    <div class="panel-body">
                        <p><b>Task Name:</b> {{ $task->title }}</p>
                        <p>Status:
                            @if($task->status == TRUE)
                                <span class="label label-success">COMPLETED</span>
                            @else
                                <span class="label label-warning">PENDING</span>
                            @endif
                            <a href="{{ URL::to('tasks-update-status/'.$task->id)  }}"><i class="ti-reload"></i></a>
                        </p>
                        <p>Created On: {{ Carbon\Carbon::parse($task->created_at)->format('D d M, Y') }}</p>
                        <p>Due Date: {{ Carbon\Carbon::parse($task->start_at)->format('D d M, Y') }}</p>
                        <p>Last Updated On: {{ Carbon\Carbon::parse($task->updated_at)->format('D d M, Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 pull-right">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Action Table</h3>
                    </div>
                    <div class="panel-body">

                        <p><a href="{{ url('tasks/'.$task->id.'/edit') }}"> <i class="ti-pencil-alt"></i> Update Task</a></p>
                        <p><a href="#note"><i class="ti-pencil-alt"></i> Add Notes</a></p>
                        <p><a href="#logs"><i class="ti-notepad"></i> View Logs</a></p>
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

                         {{ $task->description }}</p>

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Notes</h3>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @foreach($task->comments as $t)
                                <li>{{ $t->content }} ~ <i><small>{{ $t->created_at->diffForHumans() }}</small></i> </li>
                            @endforeach
                        </ol>

                        <a name="note"></a>

                        {!! Form::model($task, ['action'=>'TaskController@addComment', 'method'=>'POST']) !!}

                            <div class="form-group {!! ($errors->has('content')) ? "has-error" : ""  !!}">
                        	    {!!Form::label('content','Add Note') !!}
                        	    {!!Form::textarea('content', Input::old('content'), array("class"=>"form-control", 'placeholder'=>'Notes') ) !!}
                        	    {!!Form::hidden('task_id', $task->id) !!}
                            </div>

                        {!! Form::submit('Add Note', ['class'=> 'btn btn-primary']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Logs</h3>
                    </div>
                    <div class="panel-body">

                        <a name="logs"></a>

                        logs will be displayed here ~ <i><small>{{ Carbon\Carbon::now()->subHours(5)->diffForHumans() }}</small></i>

                    </div>
                </div>
            </div>

        </div>


@stop