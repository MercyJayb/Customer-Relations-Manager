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
                    <div class="panel-body">
                        <p><b>Invoice ID:</b> {{ $invoice->id }}</p>
                        <p><b>Client Name:</b> {{ $invoice->client->fullnameAndCompany }}</p>
                        <p><b>Amount:</b> {{ $invoice->total }}</p>
                        <p><b>Frequency:</b> {{ $invoice->frequency }}</p>
                        <p>Status:
                            @if($invoice->status)
                                <span class="label label-success">COMPLETED</span>
                            @else
                                <span class="label label-warning">PENDING</span>
                            @endif
                            <a href="{{ URL::to('invoices-update-status/'.$invoice->id)  }}"><i class="ti-reload"></i></a>
                        </p>
                        <p>Created On: {{ Carbon\Carbon::parse($invoice->created_at)->format('D d M, Y') }}</p>
                        <p>Due Date: {{ Carbon\Carbon::parse($invoice->date_due)->format('D d M, Y') }}</p>
                        <p>Last Updated On: {{ Carbon\Carbon::parse($invoice->updated_at)->format('D d M, Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 pull-right">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Action Table</h3>
                    </div>
                    <div class="panel-body">
                        <p><a href=""><i class="ti-notepad"></i> Download </a></p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h3 class="panel-title">Description</h3>
                    </div>
                    <div class="panel-body">

                        <p>{{ $invoice->comments }}</p>

                    </div>
                </div>
            </div>

        </div>




@stop