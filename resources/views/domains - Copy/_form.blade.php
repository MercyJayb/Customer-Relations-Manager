
<div class="form-group {!! ($errors->has('client_id')) ? "has-error" : ""  !!}">
	{!!Form::label('client_id','Choose Client:') !!}
	{!!Form::select('client_id', [''=>'Select Client'] + $clients, Input::old('level_id'), array("class"=>"form-control", 'placeholder'=>'Level') ) !!}
</div>

<div class="form-group {!! ($errors->has('domain')) ? "has-error" : ""  !!}">
	{!!Form::label('domain','Domain Name:') !!}
	{!!Form::text('domain', Input::old('domain'), array("class"=>"form-control", 'placeholder'=>'bluewebsafrica.co.ke') ) !!}
</div>

<div class="form-group {!! ($errors->has('ip')) ? "has-error" : ""  !!}">
	{!!Form::label('ip','IP Address:') !!}
	{!!Form::text('ip', Input::old('ip'), array("class"=>"form-control", 'placeholder'=>'192.168.122.111') ) !!}
</div>

<div class="form-group {!! ($errors->has('username')) ? "has-error" : ""  !!}">
	{!!Form::label('username','Username:') !!}
	{!!Form::text('username', Input::old('username'), array("class"=>"form-control", 'placeholder'=>'username') ) !!}
</div>

<div class="form-group {!! ($errors->has('email')) ? "has-error" : ""  !!}">
	{!!Form::label('email','Email:') !!}
	{!!Form::text('email', Input::old('email'), array("class"=>"form-control", 'placeholder'=>'info@example.com') ) !!}
</div>


<div class="form-group {!! ($errors->has('start_date')) ? "has-error" : ""  !!}">
	{!!Form::label('start_date','Start Date:') !!}
	{!!Form::text('start_date', $domain->start_date, array("class"=>"form-control datepicker", 'placeholder'=>'date') ) !!}
</div>


<div class="form-group {!! ($errors->has('disk_partition')) ? "has-error" : ""  !!}">
	{!!Form::label('disk_partition','Disk Partition:') !!}
	{!!Form::text('disk_partition', Input::old('disk_partition', 'home'), array("class"=>"form-control", 'placeholder'=>'') ) !!}
</div>

<div class="form-group {!! ($errors->has('quota')) ? "has-error" : ""  !!}">
	{!!Form::label('quota','Quota:') !!}
	{!!Form::text('quota', Input::old('quota'), array("class"=>"form-control", 'placeholder'=>'') ) !!}
</div>

<div class="form-group {!! ($errors->has('disk_space_used')) ? "has-error" : ""  !!}">
	{!!Form::label('disk_space_used','Disk Space Used:') !!}
	{!!Form::text('disk_space_used', Input::old('disk_space_used'), array("class"=>"form-control", 'placeholder'=>'') ) !!}
</div>

<div class="form-group {!! ($errors->has('package')) ? "has-error" : ""  !!}">
	{!!Form::label('package','Package:') !!}
	{!!Form::text('package', Input::old('package'), array("class"=>"form-control", 'placeholder'=>'') ) !!}
</div>

<div class="form-group {!! ($errors->has('theme')) ? "has-error" : ""  !!}">
	{!!Form::label('theme','Theme:') !!}
	{!!Form::text('theme', Input::old('theme','x3'), array("class"=>"form-control", 'placeholder'=>'') ) !!}
</div>

<div class="form-group {!! ($errors->has('owner')) ? "has-error" : ""  !!}">
	{!!Form::label('owner','Owner:') !!}
	{!!Form::text('owner', Input::old('owner','bluecosp'), array("class"=>"form-control", 'placeholder'=>'') ) !!}
</div>

<div class="form-group {!! ($errors->has('server')) ? "has-error" : ""  !!}">
	{!!Form::label('server','Server:') !!}
	{!!Form::text('server', Input::old('server', 'host14.registrar-servers.com'), array("class"=>"form-control", 'placeholder'=>'') ) !!}
</div>

<div class="form-group {!! ($errors->has('unix_start_date')) ? "has-error" : ""  !!}">
	{!!Form::label('unix_start_date','Unix Start Date:') !!}
	{!!Form::text('unix_start_date', Input::old('unix_start_date'), array("class"=>"form-control", 'placeholder'=>'') ) !!}
</div>

<div class="form-group {!! ($errors->has('disk_space_used_bytes')) ? "has-error" : ""  !!}">
	{!!Form::label('disk_space_used_bytes','Disk Space Used Bytes:') !!}
	{!!Form::text('disk_space_used_bytes', Input::old('disk_space_used_bytes'), array("class"=>"form-control", 'placeholder'=>'') ) !!}
</div>

<div class="form-group {!! ($errors->has('quota_bytes')) ? "has-error" : ""  !!}">
	{!!Form::label('quota_bytes','Quota Bytes:') !!}
	{!!Form::text('quota_bytes', Input::old('quota_bytes'), array("class"=>"form-control", 'placeholder'=>'') ) !!}
</div>

	{!!Form::submit('Submit', array('class'=>'btn btn-primary')) !!}

