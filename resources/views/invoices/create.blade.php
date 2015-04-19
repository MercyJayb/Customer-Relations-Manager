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

		{!! Form::open(array('url'=> 'newinvoice', 'method'=> 'POST', 'role'=>'form')) !!}

			@include('invoices._form')
			
		{!! Form::close() !!}
	</div>
</div>
@stop

@section('formjs')

    {{--<script>--}}
        {{--$('#client').change(function(){--}}

            {{--var client = $(this).val();--}}
            {{--var host = "{{URL::to('/')}}";--}}
            {{--var url = host + '/newinvoice/' + client;--}}
            {{--$.ajax({--}}
                {{--url: url,--}}
                {{--type: 'GET',--}}
                {{--beforeSend: function(){--}}
                     {{--$('.client_services').html('Loading...');--}}
                {{--},--}}
                {{--success: function(data){--}}
                    {{--$.each(data.id, function (i) {--}}
                        {{--$('.client_services').html('<input type="text" name="service"+i value=+client+ class="form-control">');--}}
                    {{--});--}}

                {{--}--}}
            {{--});--}}

            {{--return false;--}}

        {{--});--}}
    {{--</script>--}}

    {{--<div class="form-group {!! ($errors->has('client_service_id[]')) ? "has-error" : ""  !!}">--}}
    {{--{!!Form::label('client_service_id','Amount for Service Name:') !!}--}}
    {{--{!!Form::text('client_service_id[]', Input::old('client_service_id'), array("class"=>"form-control", "id"=>"service", 'placeholder'=>'Amount') ) !!}--}}
    {{--</div>--}}

	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	{!! HTML::script('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js') !!}
	{!! HTML::script('vendor/bootstrap-timepicker/bootstrap-timepicker.min.js') !!}
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@stop



