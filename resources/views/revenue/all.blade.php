@extends('template')


@section('content')

    <p class="text-small margin-bottom-20">
        @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        </p>

        {{--Start Overdue Tasks--}}
        <h4>Overdue Tasks</h4>
        <div class="panel panel-white">

            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th style="width:217px;">Starting Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($overduetasks as $task)
                        <tr>
                            <td class="center">{{ $task->id }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('tasks/'.$task->id)}}">{{ $task->title }}</a></td>
                            <td>{{ $task->start_at->format('h:ia D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($task->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('tasks-update-status/'.$task->id)  }}"><i class="ti-reload"></i></a>

                                </div>
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

    {{--End OverDue Tasks--}}
        {{--Start Today Tasks--}}
        <h4>Today Tasks</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th style="width:217px;">Starting Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($todaytasks as $task)
                        <tr>
                            <td class="center">{{ $task->id }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('tasks/'.$task->id)}}">{{ $task->title }}</a></td>
                            <td>{{ $task->start_at->format('h:ia D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($task->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('tasks-update-status/'.$task->id)  }}"><i class="ti-reload"></i></a>


                                </div>
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

        {{--End Today Tasks--}}
        {{--Start Tomorrow Tasks--}}
        <h4>Tomorrow Tasks</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th style="width:217px;">Starting Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($tomorrowtasks as $task)
                        <tr>
                            <td class="center">{{ $task->id }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('tasks/'.$task->id)}}">{{ $task->title }}</a></td>
                            <td>{{ $task->start_at->format('h:ia D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($task->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('tasks-update-status/'.$task->id)  }}"><i class="ti-reload"></i></a>

                                </div>
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

        {{--End Tomorrow Tasks--}}
        {{--Start This Week Tasks--}}
        <h4>This Week Tasks</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th style="width:217px;">Starting Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($thisweektasks as $task)
                        <tr>
                            <td class="center">{{ $task->id }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('tasks/'.$task->id)}}">{{ $task->title }}</a></td>
                            <td>{{ $task->start_at->format('h:ia D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($task->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('tasks-update-status/'.$task->id)  }}"><i class="ti-reload"></i></a>

                                </div>
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

        {{--End This Week Tasks--}}
        {{--Start Next Week Tasks--}}
        <h4>Next Week Tasks</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th style="width:217px;">Starting Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nextweektasks as $task)
                        <tr>
                            <td class="center">{{ $task->id }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('tasks/'.$task->id)}}">{{ $task->title }}</a></td>
                            <td>{{ $task->start_at->format('h:ia D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($task->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('tasks-update-status/'.$task->id)  }}"><i class="ti-reload"></i></a>

                                </div>
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

        {{--End Next Week Tasks--}}

        {{--Start Next Month Tasks--}}
        <h4>Next Month Tasks</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th style="width:217px;">Starting Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nextmonthtasks as $task)
                        <tr>
                            <td class="center">{{ $task->id }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('tasks/'.$task->id)}}">{{ $task->title }}</a></td>
                            <td>{{ $task->start_at->format('h:ia D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    @if($task->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('tasks-update-status/'.$task->id)  }}"><i class="ti-reload"></i></a>

                                </div>
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

        {{--End Next Month Tasks--}}
        {{--Start Other Tasks--}}
        <h4>Other Tasks</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th style="width:217px;">Starting Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($othertasks as $task)
                        <tr>
                            <td class="center">{{ $task->id }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('tasks/'.$task->id)}}">{{ $task->title }}</a></td>
                            <td>{{ $task->start_at->format('h:ia D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($task->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('tasks-update-status/'.$task->id)  }}"><i class="ti-reload"></i></a>

                                </div>
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

        {{--End Other Tasks--}}


@stop

@section('dataTables')
    <script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/media/blog/bootstrap_2/DT_bootstrap.js"></script>
@stop


