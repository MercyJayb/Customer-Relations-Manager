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
                        <th class="hidden-xs">Invoice ID</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Due Date</th>
                        <th class="hidden-xs" style="width:133px;">Status</th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($invoices as $invoice)
                    <tr>
                        <td class="center">{{ $invoice->id }}</td>
                        <td class="hidden-xs"><a href="{{URL::to('invoices/'.$invoice->id)}}">{{ $invoice->id }}</a></td>
                        <td>{{ $invoice->client->fullnameAndCompany }}</td>
                        <td>{{ $invoice->date_due->format('D d M, Y') }}</td>
                        <td>@if($invoice->status)
                                <span class="label label-success">COMPLETED</span>
                            @else
                                <span class="label label-warning">PENDING</span>
                            @endif
                            <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>
                        </td>

                        <td class="center">
                            <div class="visible-md visible-lg hidden-sm hidden-xs">
                                <a href="{{ URL::to('invoices/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                            </div>
                        </td>
                        <td>
                            {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('InvoiceController@destroy',$invoice->id))) !!}
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


