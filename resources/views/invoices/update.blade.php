
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

            {!! Form::model($invoice, array('url'=>  URL::to('invoices/'.$invoice->id) , 'method'=> 'PUT', 'role'=>'form')) !!}


            <div class="form-group {!! ($errors->has('invoice_number')) ? "has-error" : ""  !!}">
            {!!Form::label('invoice_number','Invoice Number:') !!}
            {!!Form::text('invoice_number', Input::old('invoice_number', $invoice->id), array("class"=>"form-control", 'readonly'=>'readonly','placeholder'=>'Invoice_number') ) !!}
        </div>

        <div class="form-group {!! ($errors->has('client_id')) ? "has-error" : ""  !!}">
        {!!Form::label('client_id','Client Name:') !!}
        {!!Form::text('_client', $invoice->client->fullnameAndCompany, array("class"=>"form-control", 'readonly'=>'readonly', "id"=>"client") ) !!}
        {!!Form::hidden('client_id', $invoice->client->id, array("class"=>"form-control", 'readonly'=>'readonly', "id"=>"client") ) !!}
    </div>

    @foreach($invoice->client->client_service as $service)

        <div class="form-group {!! ($errors->has('client_service_id[]')) ? "has-error" : ""  !!}">
        {!!Form::label("client_service_id[{$service->id}]","Charges for {$service->service->name} :") !!}
        {!!Form::text("client_service_id[{$service->id}]", $service->cost, array("class"=>"form-control", "id"=>"service", 'readonly'=>'readonly','id'=>'service'.$service->id, 'placeholder'=>'') ) !!}
        </div>

    @endforeach


    <div class="form-group {!! ($errors->has('date_due')) ? "has-error" : ""  !!}">
    {!!Form::label('date_due','Due Date:') !!}
    {!!Form::input('date','date_due', $invoice->date_due->format('Y-m-d'), array("class"=>"form-control", 'placeholder'=>'Due date') ) !!}
    </div>

    <div class="form-group {!! ($errors->has('frequency')) ? "has-error" : ""  !!}">
    {!!Form::label('frequency','Frequency:') !!}
    {!!Form::select('frequency', [''=>'Please select'] + $frequency, Input::old('frequency'), ["class"=>"form-control"] ) !!}
    </div>


    <div class="form-group {!! ($errors->has('comments')) ? "has-error" : ""  !!}">
    {!!Form::label('comments','Comments:') !!}
    {!!Form::textarea('comments', Input::old('comments'), array("class"=>"form-control", 'placeholder'=>'comments') ) !!}
    </div>

    {!!Form::submit('Update Invoice', array('class'=>'btn btn-primary')) !!}

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




