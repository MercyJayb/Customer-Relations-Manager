@extends('template')


@section('content')

    <p class="text-small margin-bottom-20">
        @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        </p>

        {{--Start Overdue invoices--}}
        <h4>Overdue Invoices</h4>
        <div class="panel panel-white">

            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($overdueinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End OverDue invoices--}}
        {{--Start Today invoices--}}
        <h4>Today's Invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($todayinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>


                                </div>
                            </td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End Today invoices--}}
        {{--Start Tomorrow invoices--}}
        <h4>Tomorrow's Invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($tomorrowinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End Tomorrow invoices--}}
        {{--Start This Week invoices--}}
        <h4>This Week's Invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($thisweekinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End This Week invoices--}}
        {{--Start Next Week invoices--}}
        <h4>Next Week's Invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nextweekinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End Next Week invoices--}}

        {{--Start This Month invoices--}}
        <h4>This Month's Invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th style="width:217px;">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($thismonthinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End This Month invoices--}}
        {{--Start Next Month invoices--}}
        <h4>Next Month's Invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nextmonthinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End Next Month invoices--}}
        {{--Start Next 2 Months invoices--}}
        <h4>{{ Carbon\Carbon::now()->addMonths(2)->format('F') }} invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nexttwomonthsinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End Next 2 Months invoices--}}

        {{--Start Next 3 months invoices--}}
        <h4>{{ Carbon\Carbon::now()->addMonths(3)->format('F') }} invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nextthreemonthsinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End 3 months invoices--}}

        {{--Start four months invoices--}}
        <h4>{{ Carbon\Carbon::now()->addMonths(4)->format('F') }} invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nextfourmonthsinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End four months invoices--}}

        {{--Start five months invoices--}}
        <h4>{{ Carbon\Carbon::now()->addMonths(5)->format('F') }} invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nextfivemonthsinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End five invoices--}}

        {{--Start six invoices--}}
        <h4>{{ Carbon\Carbon::now()->addMonths(6)->format('F') }} invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nextsixmonthsinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End six invoices--}}

        {{--Start seven invoices--}}
        <h4>{{ Carbon\Carbon::now()->addMonths(7)->format('F') }} invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nextsevenmonthsinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End seven invoices--}}

        {{--Start eight invoices--}}
        <h4>{{ Carbon\Carbon::now()->addMonths(8)->format('F') }} invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nexteightmonthsinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End eight invoices--}}

        {{--Start nine invoices--}}
        <h4>{{ Carbon\Carbon::now()->addMonths(9)->format('F') }} invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nextninemonthsinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End nine invoices--}}

        {{--Start ten invoices--}}
        <h4>{{ Carbon\Carbon::now()->addMonths(10)->format('F') }} invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nexttenmonthsinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End ten invoices--}}

        {{--Start eleven invoices--}}
        <h4>{{ Carbon\Carbon::now()->addMonths(11)->format('F') }} invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th class="hidden-xs">Invoice Number</th>
                        <th class="hidden-xs">Client Name</th>
                        <th class="hidden-xs">Total</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($nextelevenmonthsinvoices as $invoice)
                        <tr>
                            <td class="hidden-xs"><a href="{{URL::to('inv/'.$invoice->invoice_id)}}">{{ $invoice->invoice_id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('D d M, Y') }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">

                                    @if($invoice->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>

                                </div>
                            </td>

                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('inv/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('Invoice_RecordsController@destroy',$invoice->id))) !!}
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

        {{--End ten invoices--}}




@stop

@section('dataTables')
    <script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/media/blog/bootstrap_2/DT_bootstrap.js"></script>
@stop


