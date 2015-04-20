
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