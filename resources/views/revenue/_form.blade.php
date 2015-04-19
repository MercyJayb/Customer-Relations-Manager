
<div class="form-group {!! ($errors->has('title')) ? "has-error" : ""  !!}">
	{!!Form::label('title','Task Title:') !!}
	{!!Form::text('title', Input::old('title'), array("class"=>"form-control", 'placeholder'=>'task Title') ) !!}
</div> 

<div class="form-group {!! ($errors->has('description')) ? "has-error" : ""  !!}">
	{!!Form::label('description','Task Description:') !!}
	{!!Form::textarea('description', Input::old('description'), array("class"=>"form-control", 'placeholder'=>'description') ) !!}
</div>

<div class="form-group {!! ($errors->has('start_at')) ? "has-error" : ""  !!}">
	{!!Form::label('start_at','Due Date:') !!}
	{!!Form::input('date','start_at', date('Y-m-d'), array("class"=>"form-control datepicker") ) !!}
</div>

<div class="form-group {!! ($errors->has('time')) ? "has-error" : ""  !!}">
	    {!!Form::label('time','Due Time:') !!}
        {!!Form::select('time', [''=>'Select Time'] + $time, Input::old('time'), array("class"=>"form-control") ) !!}
</div>


{!!Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
