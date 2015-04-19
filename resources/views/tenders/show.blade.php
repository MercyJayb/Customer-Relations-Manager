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
                    <h3 class="panel-title">Tender Details</h3>
                </div>
                <div class="panel-body">
                    <p><b>Tender Name:</b> {{ $tender->title }}</p>
                    <p><b>Client Name:</b> {{ $tender->client->fullnameAndCompany }}</p>
                    <p>Status:
                        @if($tender->status == TRUE)
                            <span class="label label-success">COMPLETED</span>
                        @else
                            <span class="label label-warning">PENDING</span>
                        @endif
                        <a href="{{ URL::to('tenders-update-status/'.$tender->id)  }}"><i class="ti-reload"></i></a>
                    </p>
                    <p>Due Date: {{ Carbon\Carbon::parse($tender->start_date)->format('D d M, Y') }}</p>

                    <p>Created On: {{ Carbon\Carbon::parse($tender->created_at)->format('D d M, Y') }}</p>
                    <p>Last Updated On: {{ Carbon\Carbon::parse($tender->updated_at)->format('D d M, Y') }}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pull-right">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title">Action Table</h3>
                </div>
                <div class="panel-body">

                    <p><a href="{{ url('tenders/'.$tender->id.'/edit') }}"> <i class="ti-pencil-alt"></i> Update Tender</a></p>
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

                    <p>{{ $tender->description }}</p>

                </div>
            </div>
        </div>

    </div>


@stop