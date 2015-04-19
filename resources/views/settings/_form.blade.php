<div class="form-group {{ ($errors->has('company')) ? "has-error" : "" }}">
	{{Form::label('company','Company Name:')}}
	{{Form::text('company', Input::old('company'), array("class"=>"form-control", 'placeholder'=>'Company Name') )}}
</div>

<div class="form-group {{ ($errors->has('slogan')) ? "has-error" : "" }}">
	{{Form::label('slogan','Slogan:')}}
	{{Form::text('slogan', Input::old('slogan'), array("class"=>"form-control", 'placeholder'=>'Slogan') )}}
</div>

<div class="form-group {{ ($errors->has('email')) ? "has-error" : "" }}">
	{{Form::label('email','Email:')}}
	{{Form::text('email', Input::old('email'), array("class"=>"form-control", 'placeholder'=>'email') )}}
</div>

<div class="form-group {{ ($errors->has('logo')) ? "has-error" : "" }}">
	{{Form::label('logo','Logo:')}}
	{{Form::file('logo', array("class"=>"form-control" ) )}}
</div>

<div class="form-group {{ ($errors->has('address')) ? "has-error" : "" }}">
	{{Form::label('address','Postal Address:')}}
	{{Form::textarea('address', Input::old('address'), array("class"=>"form-control",'placeholder'=>'Postal Address') )}}
</div>

	{{Form::submit('Submit', array('class'=>'btn btn-primary'))}}