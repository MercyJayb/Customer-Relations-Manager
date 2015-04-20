@extends('template')

@section('formcss')
    <link href="{{ URL::asset('vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('vendor/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" media="screen">
@stop

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

            {!! Form::model($faketender, array('url'=> 'faketenders', 'method'=> 'POST', 'role'=>'form')) !!}


            <div class="form-group {!! ($errors->has('client_id')) ? "has-error" : ""  !!}">
            {!!Form::label('client','Client Name:') !!}
            {!!Form::text('client',  Input::old('client'), array("class"=>"form-control", 'placeholder'=>'Client Name') ) !!}
            </div>

            <div class="form-group {!! ($errors->has('name')) ? "has-error" : ""  !!}">
            {!!Form::label('title','Tender Title:') !!}
            {!!Form::text('title', Input::old('name'), array("class"=>"form-control", 'placeholder'=>'Tender Title') ) !!}
            </div>

            <div class="form-group {!! ($errors->has('description')) ? "has-error" : ""  !!}">
            {!!Form::label('description','Tender Description:') !!}
            {!!Form::textarea('description', Input::old('description'), array("class"=>"form-control", 'placeholder'=>'Title Description') ) !!}
            </div>

            <div class="form-group {!! ($errors->has('start_date')) ? "has-error" : ""  !!}">
            {!!Form::label('start_date','Due Date:') !!}
            {!!Form::input('date','start_date', Carbon\Carbon::parse($faketender->start_date)->format('Y-m-d'), array("class"=>"form-control datepicker") ) !!}
            </div>

            {!!Form::submit('Create Tender', array('class'=>'btn btn-primary')) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('formjs')
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    {!! HTML::script('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js') !!}
    {!! HTML::script('vendor/bootstrap-timepicker/bootstrap-timepicker.min.js') !!}
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@stop



