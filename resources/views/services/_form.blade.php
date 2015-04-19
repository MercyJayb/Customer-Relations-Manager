
<div class="form-group {!! ($errors->has('name')) ? "has-error" : ""  !!}">
	{!!Form::label('name','Services Name:') !!}
	{!!Form::text('name', Input::old('name'), array("class"=>"form-control", 'placeholder'=>'e.g Domain Registration') ) !!}
</div> 

<div class="form-group {!! ($errors->has('cost')) ? "has-error" : ""  !!}">
	{!!Form::label('cost','Cost:') !!}
	{!!Form::text('cost', Input::old('cost'), array("class"=>"form-control", 'placeholder'=>'cost') ) !!}
</div>


{!!Form::submit($btnText, array('class'=>'btn btn-primary')) !!}
