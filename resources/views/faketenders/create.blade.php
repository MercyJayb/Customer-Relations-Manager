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

            @include('faketenders._form');

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



