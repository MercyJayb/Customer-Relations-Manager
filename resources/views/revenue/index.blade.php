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
                    <table data-order='[[ 0, "asc" ]]' data-page-length='12' class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr>
                                <th style="width:1px;">#</th>
                                <th class="hidden-xs">Month</th>
                                <th>Collected (Kshs.) (Assume you charge 1,000)</th>
                            </tr>
                        </thead>
                        <tbody>



                            @foreach($revenues as $key => $revenue)
                            <tr>
                                <th>{{ $m = $key+1 }}</th>
                                <td class="hidden-xs">{{ Carbon\Carbon::createFromFormat('m',$m)->format('F') }}</td>
                                <td>{{ $revenue*1000 }}</td>
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


