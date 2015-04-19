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
                        <h3 class="panel-title">Client Details</h3>
                    </div>
                    <div class="panel-body">
                        <p><b>Company Name:</b> {{ $client->company }}</p>
                        <p>Contact Person: {{ $client->fullname }}</p>
                        <p>Email: {{ $client->email }}</p>
                        <p>Other Emails: {{ $client->emails }}</p>
                        <p>Mobile Number: {{ $client->phone }}</p>
                        <p>Address: {{ $client->address }}</p>
                        <p>Joined: {{ Carbon\Carbon::parse($client->created_at)->format('D d M, Y') }}</p>
                        <p>Last Updated On: {{ Carbon\Carbon::parse($client->updated_at)->format('D d M, Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 pull-right">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Action Table</h3>
                    </div>
                    <div class="panel-body">

                        <p><a href="{{ url('addservice/'.$client->id) }}"><i class="ti-pencil-alt"></i> Add Service</a></p>
                        <p><a href="{{ url('clients/'.$client->id.'/edit') }}"> <i class="ti-pencil-alt"></i> Update Client</a></p>
                        <p><a href="#inv"> <i class="ti-pencil-alt"></i> View Invoices</a></p>

                    </div>
                </div>
            </div>

        </div>




        <div class="panel panel-white">

            <div class="panel-body">

                <div class="panel-heading">
                    <h4 class="panel-title">Services</h4>
                </div>

                <table data-order='[[ 0, "desc" ]]' data-page-length='10' class="table table-striped table-bordered table-hover" id="example" >
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Service Name</th>
                        <th class="hidden-xs">Cost</th>
                        <th class="hidden-xs">Frequency</th>
                        <th style="width: 1px"></th>
                        <th style="width: 1px"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(count($client->client_service))
                        @foreach($client->client_service as $service)
                            <tr>
                                <td class="center">{{ $service->id }}</td>
                                <td>{{ $service->service->name }}</td>
                                <td>{{ $service->cost }}</td>
                                <td>{{ CRM\ClientService::frequency($service->frequency) }}</td>
                                <td class="center">
                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                        <a href="{{ URL::to('client_services/'.$service->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Update</a>
                                    </div>
                                </td>
                                <td>
                                    {!! Form::model($client->service_service ,array('style'=>'margin: 0px;', 'action'=> array('ClientServiceController@destroy',$service->id))) !!}
                                    <button class = 'btn btn-danger btn-xs' type="submit"  >Delete</button>
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    @endif


                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-white">

            <div class="panel-body">
                <div class="panel-heading">
                    <h4 class="panel-title">Projects</h4>
                </div>


                <table data-order='[[ 0, "desc" ]]' data-page-length='10' class="table table-striped table-bordered table-hover" id="example" >
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Project Title</th>
                        <th class="hidden-xs">Description</th>
                        <th class="hidden-xs">Start Date</th>
                        <th class="hidden-xs">End Date</th>
                        <th class="hidden-xs">Created On</th>
                        <th class="hidden-xs">Last Updated On</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>


                    @if(count($client->project))
                        @foreach($client->project as $p)
                            <tr>
                                <td class="center">{{ $p->id }}</td>
                                <td>{{ $p->title }}</td>
                                <td>{{ $p->description }}</td>
                                <td>{{ Carbon\Carbon::parse($p->start_at)->format('D d M, Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($p->end_at)->format('D d M, Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($p->created_at)->format('D d M, Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($p->updated_at)->format('D d M, Y') }}</td>
                                <td class="center">
                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                        <a href="{{ URL::to('projects/'.$p->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Update</a>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    @endif


                    </tbody>
                </table>
            </div>
        </div>

        <div class="panel panel-white">

            <div class="panel-body">
                <div class="panel-heading">
                    <h4 class="panel-title">Invoices</h4>
                </div>

                <table data-order='[[ 0, "desc" ]]' data-page-length='10' class="table table-striped table-bordered table-hover" id="example" >
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Amount</th>
                        <th>Frequency</th>
                        <th class="hidden-xs">Date Due</th>
                        <th class="hidden-xs">Created On</th>
                        <th class="hidden-xs">Last Updated On</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <a name="inv"></a>
                    @if(count($client->invoice))
                        @foreach($client->invoice as $i)
                            <tr>
                                <td class="center">{{ $i->id }}</td>
                                <td>{{ $i->total }}</td>
                                <td>{{ $i->frequency }}</td>
                                <td>{{ Carbon\Carbon::parse($i->date_due)->format('D d M, Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($i->created_at)->format('D d M, Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($i->updated_at)->format('D d M, Y') }}</td>
                                <td class="center">
                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                        <a href="{{ URL::to('invoices/'.$i->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Update</a>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    @endif


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