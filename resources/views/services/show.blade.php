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
                    <h3 class="panel-title">Service Details</h3>
                </div>
                <div class="panel-body">
                    <p><b>Service Name:</b> {{ $service->name }}</p>
                    <p>Created On: {{ $service->created_at->format('D d M, Y') }}</p>
                    <p>Last Updated On: {{ $service->updated_at->format('D d M, Y') }}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pull-right">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title">Action Table</h3>
                </div>
                <div class="panel-body">

                    <p><a href="{{ url('services/'.$service->id.'/edit') }}"> <i class="ti-pencil-alt"></i> Update Service</a></p>
                </div>
            </div>
        </div>

    </div>

@stop