@extends('template')


@section('content')

    <p class="text-small margin-bottom-20">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
    </p>
            <div class="panel panel-white">

                <div class="panel-body">
                    <table data-order='[[ 2, "asc" ]]' data-page-length='10' class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr>
                                <th style="width:1px;">#</th>
                                <th class="hidden-xs">Title</th>
                                <th style="width:217px;">Starting Date</th>
                                <th style="width:138px;"></th>
                                <th style="width:1px;"></th>
                                <th style="width:1px;"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($tasks as $task)
                            <tr>
                                <td class="center">{{ $task->id }}</td>
                                <td class="hidden-xs"><a href="{{URL::to('tasks/'.$task->id)}}">{{ $task->title }}</a></td>
                                <td>{{ $task->start_at->format('h:ia D d M, Y') }}</td>
                                <td>
                                    @if($task->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('tasks-update-status/'.$task->id)  }}"><i class="ti-reload"></i></a>
                                </td>
                                <td class="center">
                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                        <a href="{{ URL::to('tasks/'.$task->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                    </div>
                                </td>
                                <td>
                                    {!! Form::model($task ,array('style'=>'margin: 0px;', 'action'=> array('TaskController@destroy',$task->id))) !!}
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


