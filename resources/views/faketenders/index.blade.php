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
            <table data-order='[[ 0, "desc" ]]' data-page-length='10' class="table table-striped table-bordered table-hover" id="example" >
                <thead>
                <tr>
                    <th style="width: 1px;">#</th>
                    <th class="hidden-xs">Tender Title</th>
                    <th class="hidden-xs">Client</th>
                    <th class="hidden-xs">Start Date</th>
                    <th style="width: 1px;"></th>
                    <th style="width: 1px;"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($faketenders as $faketender)
                    <tr>
                        <td class="center">{{ $faketender->id }}</td>
                        <td><a href="{{ URL::to('faketenders/'.$faketender->id) }}">{{ $faketender->title }}</a></td>
                        <td class="hidden-xs">{{ $faketender->client->fullnameAndCompany }}</td>
                        <td>{{ $faketender->start_date->format('h:ia D d M, Y') }} </td>

                        <td class="center">
                            <div class="visible-md visible-lg hidden-sm hidden-xs">
                                <a href="{{ URL::to('faketenders/'.$faketender->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                            </div>
                        </td>
                        <td>
                            {!! Form::model($faketender ,array('style'=>'margin: 0px;', 'action'=> array('faketenderController@destroy',$faketender->id))) !!}
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


