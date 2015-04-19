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
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th class="hidden-xs">Client Name</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $a = 1; ?>
                    @foreach($overdueinvoices as $invoice)
                        <tr>
                            <td class="center">{{ $a++ }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('invoices/'.$invoice->id)}}">{{ $invoice->id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->start_at->format('h:ia D d M, Y') }}</td>
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
                                    <a href="{{ URL::to('invoices/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('invoiceController@destroy',$invoice->id))) !!}
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
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th class="hidden-xs">Client Name</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $b = 1; ?>
                    @foreach($todayinvoices as $invoice)
                        <tr>
                            <td class="center">{{ $b++ }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('invoices/'.$invoice->id)}}">{{ $invoice->id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->start_at->format('h:ia D d M, Y') }}</td>
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
                                    <a href="{{ URL::to('invoices/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('invoiceController@destroy',$invoice->id))) !!}
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
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th class="hidden-xs">Client Name</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $c = 1; ?>
                    @foreach($tomorrowinvoices as $invoice)
                        <tr>
                            <td class="center">{{ $c++ }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('invoices/'.$invoice->id)}}">{{ $invoice->id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->start_at->format('h:ia D d M, Y') }}</td>
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
                                    <a href="{{ URL::to('invoices/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('invoiceController@destroy',$invoice->id))) !!}
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
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th class="hidden-xs">Client Name</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $d = 1; ?>
                    @foreach($thisweekinvoices as $invoice)
                        <tr>
                            <td class="center">{{ $d++ }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('invoices/'.$invoice->id)}}">{{ $invoice->id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->start_at->format('h:ia D d M, Y') }}</td>
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
                                    <a href="{{ URL::to('invoices/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('invoiceController@destroy',$invoice->id))) !!}
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
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th class="hidden-xs">Client Name</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $e = 1; ?>
                    @foreach($nextweekinvoices as $invoice)
                        <tr>
                            <td class="center">{{ $e++ }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('invoices/'.$invoice->id)}}">{{ $invoice->id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->start_at->format('h:ia D d M, Y') }}</td>
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
                                    <a href="{{ URL::to('invoices/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('invoiceController@destroy',$invoice->id))) !!}
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
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th class="hidden-xs">Client Name</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $h = 1; ?>
                    @foreach($thismonthinvoices as $invoice)
                        <tr>
                            <td class="center">{{ $h++ }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('invoices/'.$invoice->id)}}">{{ $invoice->id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->start_at->format('h:ia D d M, Y') }}</td>
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
                                    <a href="{{ URL::to('invoices/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('invoiceController@destroy',$invoice->id))) !!}
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
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th class="hidden-xs">Client Name</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $f = 1; ?>
                    @foreach($nextmonthinvoices as $invoice)
                        <tr>
                            <td class="center">{{ $f++ }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('invoices/'.$invoice->id)}}">{{ $invoice->id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->start_at->format('h:ia D d M, Y') }}</td>
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
                                    <a href="{{ URL::to('invoices/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('invoiceController@destroy',$invoice->id))) !!}
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
        {{--Start Other invoices--}}
        <h4>Other invoices</h4>
        <div class="panel panel-white">


            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th style="width:1px;">#</th>
                        <th class="hidden-xs">Title</th>
                        <th class="hidden-xs">Client Name</th>
                        <th style="width:217px;">Due Date</th>
                        <th style="width:113px;"></th>
                        <th style="width:1px;"></th>
                        <th style="width:1px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $g = 1; ?>
                    @foreach($otherinvoices as $invoice)
                        <tr>
                            <td class="center">{{ $g++ }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('invoices/'.$invoice->id)}}">{{ $invoice->id }}</a></td>
                            <td>{{ $invoice->client->fullnameAndCompany }}</td>
                            <td>{{ $invoice->start_at->format('h:ia D d M, Y') }}</td>
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
                                    <a href="{{ URL::to('invoices/'.$invoice->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($invoice ,array('style'=>'margin: 0px;', 'action'=> array('invoiceController@destroy',$invoice->id))) !!}
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

        {{--End Other invoices--}}


@stop

@section('dataTables')
    <script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/media/blog/bootstrap_2/DT_bootstrap.js"></script>
@stop


