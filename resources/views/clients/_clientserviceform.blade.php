
<div class="form-group {!! ($errors->has('name')) ? "has-error" : ""  !!}">
{!!Form::label('client_id','Client Name:') !!}
    {{ $client->fullnameAndCompany  }}
</div>

@if($btnText == 'Update Service')
    {!!Form::label('service_id','Service Name:') !!}
    {{ $client->client_service->name  }}
    </div>
@else
    <div class="form-group {!! ($errors->has('service_id')) ? "has-error" : ""  !!}">
    {!!Form::label('service_id','Service Name:') !!}
    <p>
    {!!Form::select('service_id', [''=>'Select Service'] + $servicelist, array("class"=>"form-control", 'placeholder'=>'name ') ) !!}
    </div>
@endif

<div class="form-group {!! ($errors->has('cost')) ? "has-error" : ""  !!}">
{!!Form::label('cost','Cost:') !!}
{!!Form::text('cost', Input::old('cost'), array("class"=>"form-control", 'placeholder'=>'cost') ) !!}
</div>

<div class="form-group {!! ($errors->has('frequency')) ? "has-error" : ""  !!}">
    {!!Form::label('frequency','Frequency:') !!}
    <p>
    {!!Form::select('frequency', [''=>'Select Frequency'] + $frequency, Input::old('frequency'), array("class"=>"form-control") ) !!}
</div>

{!!Form::submit($btnText, array('class'=>'btn btn-primary')) !!}
