@extends('template')


@section('content')

    <p class="text-small margin-bottom-20">
        @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        </p>

        {{--Start Due In Two Weeks Tasks--}}
        <div class="panel panel-white">

            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th style="width:217px;">Starting Date</th>
                        <th style="width:217px;">Client Name</th>
                        <th style="width:133px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $a = 1; ?>
                    @foreach($tendersDueInTwoWeeks as $tender)
                        <tr>
                            <td class="center">{{ $a++ }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('tenders/'.$tender->id)}}">{{ $tender->title }}</a></td>
                            <td>{{ $tender->start_date->format('h:ia D d M, Y') }}</td>
                            <td>{{ $tender->client->fullnameAndCompany }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($tender->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('tenders-update-status/'.$tender->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('tenders/'.$tender->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($tender ,array('style'=>'margin: 0px;', 'action'=> array('TenderController@destroy',$tender->id))) !!}
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

        {{--End Due In Two Weeks Tasks--}}



@stop

@section('dataTables')
    <script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/media/blog/bootstrap_2/DT_bootstrap.js"></script>
@stop


