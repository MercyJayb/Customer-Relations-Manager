@extends('template')

@section('content')


<div class="panel panel-white">

    <div class="panel-body">
        <p class="text-small margin-bottom-20">

            @if($errors->has())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        </p>

        {!! Form::model($clientservice, array('url'=> 'client_services/'.$clientservice->id, 'method'=> 'PUT', 'role'=>'form')) !!}

            <div class="form-group {!! ($errors->has('name')) ? "has-error" : ""  !!}">
                {!!Form::label('client_id','Client Name:') !!}
                {{ $clientservice->client->fullnameAndCompany  }}
            </div>

            <div>
                {!!Form::label('service_id','Service Name:') !!}
                {{ $clientservice->service->name  }}
            </div>

            <div class="form-group {!! ($errors->has('cost')) ? "has-error" : ""  !!}">
                {!!Form::label('cost','Cost:') !!}
                {!!Form::text('cost', Input::old('cost'), array("class"=>"form-control", 'placeholder'=>'cost') ) !!}
            </div>

            <div class="form-group {!! ($errors->has('frequency')) ? "has-error" : ""  !!}">
                {!!Form::label('frequency','Frequency:') !!}
                {!!Form::select('frequency', [''=>'Select Frequency'] + $frequency, Input::old('frequency'), array("class"=>"form-control") ) !!}
            </div>

            {!!Form::submit("Update Service", array('class'=>'btn btn-primary')) !!}


            {!! Form::close() !!}

            </div>
        </div>
@stop
