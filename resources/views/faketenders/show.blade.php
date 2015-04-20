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
                    <p><b>faketender Name:</b> {{ $faketender->title }}</p>
                    <p><b>Client Name:</b> {{ $faketender->client }}</p>
                    
                    <p>Due Date: {{ Carbon\Carbon::parse($faketender->start_date)->format('D d M, Y') }}</p>

                    <p>Created On: {{ Carbon\Carbon::parse($faketender->created_at)->format('D d M, Y') }}</p>
                    <p>Last Updated On: {{ Carbon\Carbon::parse($faketender->updated_at)->format('D d M, Y') }}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4 pull-right">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title">Action Table</h3>
                </div>
                <div class="panel-body">

                    <p><a href="{{ url('faketenders/'.$faketender->id.'/edit') }}"> <i class="ti-pencil-alt"></i> Update faketender</a></p>
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

                    <p>{!! nl2br(e($faketender->description)) !!}</p>

                </div>
            </div>
        </div>

    </div>


@stop