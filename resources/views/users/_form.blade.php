<div class="form-group {!! ($errors->has('username')) ? "has-error" : ""  !!}">
	{!!Form::label('username','Username:') !!}
	{!!Form::text('username', Input::old('username'), array("class"=>"form-control", 'placeholder'=>'Username') ) !!}
</div>

<div class="form-group {!! ($errors->has('firstname')) ? "has-error" : ""  !!}">
	{!!Form::label('firstname','Firstname:') !!}
	{!!Form::text('firstname', Input::old('firstname'), array("class"=>"form-control", 'placeholder'=>'Firstname') ) !!}
</div>

<div class="form-group {!! ($errors->has('lastname')) ? "has-error" : ""  !!}">
	{!!Form::label('lastname','Lastname:') !!}
	{!!Form::text('lastname', Input::old('lastname'), array("class"=>"form-control", 'placeholder'=>'Lastname') ) !!}
</div>

<div class="form-group {!! ($errors->has('level_id')) ? "has-error" : ""  !!}">
	{!!Form::label('level_id','Permissions Level:') !!}
	{!!Form::select('level_id', [''=>'Select user Level'] + $levels, Input::old('level_id'), array("class"=>"form-control", 'placeholder'=>'Level') ) !!}
</div>

<div class="form-group {!! ($errors->has('email')) ? "has-error" : ""  !!}">
	{!!Form::label('email','Email:') !!}
	{!!Form::text('email', Input::old('email'), array("class"=>"form-control", 'placeholder'=>'user@example.com') ) !!}
</div>

<div class="form-group {!! ($errors->has('phone')) ? "has-error" : ""  !!}">
	{!!Form::label('phone','Phone:') !!}
	{!!Form::text('phone', Input::old('phone'), array("class"=>"form-control", 'placeholder'=>'+254721***661') ) !!}
</div>

@if($method == "POST")

<div class="form-group {!! ($errors->has('password')) ? "has-error" : ""  !!}">
	{!!Form::label('password','Password:') !!}
	{!!Form::input('password','password', Input::old('password'), array("class"=>"form-control", 'placeholder'=>'Password') ) !!}
</div>

<div class="form-group {!! ($errors->has('password')) ? "has-error" : ""  !!}">
	{!!Form::label('cpassword','Confirm Password:') !!}
	{!!Form::input('password','cpassword', Input::old('cpassword'), array("class"=>"form-control", 'placeholder'=>'Confirm Password') ) !!}
</div>
@endif



	{!!Form::submit('Submit', array('class'=>'btn btn-primary')) !!}

