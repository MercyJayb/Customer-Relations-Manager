<div class="form-group {{ ($errors->has('username')) ? "has-error" : "" }}">
	{{Form::label('username','User Name:')}}
	{{Form::text('username', Input::old('username'), array("class"=>"form-control", 'placeholder'=>'e.g john') )}}
</div>

<div class="form-group {{ ($errors->has('firstname')) ? "has-error" : "" }}">
	{{Form::label('firstname','First Name:')}}
	{{Form::text('firstname', Input::old('firstname'), array("class"=>"form-control", 'placeholder'=>'e.g John') )}}
</div>

<div class="form-group {{ ($errors->has('lastname')) ? "has-error" : "" }}">
	{{Form::label('lastname','Last Name:')}}
	{{Form::text('lastname', Input::old('lastname'), array("class"=>"form-control", 'placeholder'=>'Lastname') )}}
</div>

<div class="form-group {{ ($errors->has('email')) ? "has-error" : "" }}">
	{{Form::label('email','Email:')}}
	{{Form::text('email', Input::old('email'), array("class"=>"form-control", 'placeholder'=>'Email') )}}
</div>

<div class="form-group {{ ($errors->has('level_id')) ? "has-error" : "" }}">
	{{Form::label('level_id','Status:')}}
	{{ Form::select('level_id', $levels, $user->level_id, array('class' => 'form-control')) }}
</div>

@if($method == "POST")

<div class="form-group {{ ($errors->has('password')) ? "has-error" : "" }}">
	{{Form::label('password','Password:')}}
	{{Form::text('password', Input::old('password'), array("class"=>"form-control", 'placeholder'=>'Password') )}}
</div>

<div class="form-group {{ ($errors->has('cpassword')) ? "has-error" : "" }}">
	{{Form::label('cpassword','Confirm Password:')}}
	{{Form::text('cpassword', Input::old('cpassword'), array("class"=>"form-control", 'placeholder'=>'Confirm Password') )}}
</div>

@endif

<div class="form-group {{ ($errors->has('phone')) ? "has-error" : "" }}">
	{{Form::label('phone','Phone Number:')}}
	{{Form::text('phone', Input::old('phone'), array("class"=>"form-control",'placeholder'=>'+254721***661') )}}
</div>

	{{Form::submit('Submit', array('class'=>'btn btn-primary'))}}

