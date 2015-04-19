<div class="form-group {{ ($errors->has('client_id')) ? "has-error" : "" !!}">
	{!!Form::label('client_id','Client:') !!}
	{!!Form::select('client_id', ['' => 'Please select a client'] + $clients , $project->client_id, array('class' => 'form-control')) !!}
</div>

<div class="form-group {!! ($errors->has('title')) ? "has-error" : ""  !!}">
	{!!Form::label('title','Project Title:') !!}
	{!!Form::text('title', Input::old('title'), array("class"=>"form-control", 'placeholder'=>'Project Title') ) !!}
</div> 

<div class="form-group {!! ($errors->has('description')) ? "has-error" : ""  !!}">
	{!!Form::label('description','Project Description:') !!}
	{!!Form::textarea('description', Input::old('description'), array("class"=>"form-control", 'placeholder'=>'description') ) !!}
</div>

<div class="form-group {!! ($errors->has('start_at')) ? "has-error" : ""  !!}">
	{!!Form::label('start_at','Starting Date:') !!}
	{!!Form::text('start_at', Input::old('start_at'), array("class"=>"form-control datepicker") ) !!}
</div>

<div class="form-group {!! ($errors->has('end_at')) ? "has-error" : ""  !!}">
	{!!Form::label('end_at','Ending Date:') !!}
	{!!Form::text('end_at', Input::old('end_at'), array("class"=>"form-control datepicker") ) !!}
</div>

{!!Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
