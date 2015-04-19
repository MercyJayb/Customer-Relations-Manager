<div class="form-group {!! ($errors->has('company')) ? "has-error" : ""  !!}">
	{!!Form::label('company','Company Name:') !!}
	{!!Form::text('company', Input::old('company'), array("class"=>"form-control", 'placeholder'=>'Company Name') ) !!}
</div>

<p>Contact Person Details:</p>

<div class="form-group {!! ($errors->has('firstname')) ? "has-error" : ""  !!}">
	{!!Form::label('firstname','Firstname:') !!}
	{!!Form::text('firstname', Input::old('firstname'), array("class"=>"form-control", 'placeholder'=>'Firstname') ) !!}
</div>

<div class="form-group {!! ($errors->has('lastname')) ? "has-error" : ""  !!}">
	{!!Form::label('lastname','Lastname:') !!}
	{!!Form::text('lastname', Input::old('lastname'), array("class"=>"form-control", 'placeholder'=>'Lastname') ) !!}
</div>

<div class="form-group {!! ($errors->has('email')) ? "has-error" : ""  !!}">
{!!Form::label('email','Email:') !!}
{!!Form::text('email', Input::old('email'), array("class"=>"form-control", 'placeholder'=>'user1@example.com') ) !!}
</div>

<div class="form-group {!! ($errors->has('emails')) ? "has-error" : ""  !!}">
{!!Form::label('emails','Other Emails:') !!}
{!!Form::text('emails', Input::old('emails'), array("class"=>"form-control", 'placeholder'=>'user2@example.com, user3@example.com') ) !!}
</div>

<div class="form-group {!! ($errors->has('phone')) ? "has-error" : ""  !!}">
	{!!Form::label('phone','Phone:') !!}
	{!!Form::text('phone', Input::old('phone'), array("class"=>"form-control", 'placeholder'=>'+254721***661') ) !!}
</div>

<div class="form-group {!! ($errors->has('address')) ? "has-error" : ""  !!}">
	{!!Form::label('address','Postal Address:') !!}
	{!!Form::textarea('address', Input::old('address'), array("class"=>"form-control",'placeholder'=>'Postal Address') ) !!}
</div>

	{!!Form::submit('Submit', array('class'=>'btn btn-primary')) !!}