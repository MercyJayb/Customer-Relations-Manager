@extends('template')

@section('content')

        <p class="text-small margin-bottom-20">
            @if(\Session::has('success'))
                <div class="alert alert-success">{{ \Session::get('success') }}</div>
            @elseif(\Session::has('error'))
                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            @endif
        </p>
        <div class="panel panel-white">

            <div class="panel-body">
                <table data-order='[[ 0, "desc" ]]' data-page-length='10' class="table table-striped table-bordered table-hover" id="example" >
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th class="hidden-xs">Client</th>
                            <th class="hidden-xs">Domain</th>
                            <th>Start Date</th>
                            <th>Email</th>
                            <th style="width: 123px">Status</th>
                            <th style="width:1px"></th>
                            <th style="width:1px"></th>
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
                            <td>
                                @if($domain->paid)
                                    <span class="label label-success">PAID</span>
                                @else
                                    <span class="label label-danger">UNPAID</span>
                                @endif
                                <a href="{{ url('update-payment/'.$domain->id) }}"> update</a>
                            </td>
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
            </div>
        </div>




@stop



@section('dataTablesjs')


	<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/media/blog/bootstrap_2/DT_bootstrap.js"></script>
@stop


