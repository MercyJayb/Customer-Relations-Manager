
<div class="form-group {!! ($errors->has('client_id')) ? "has-error" : ""  !!}">
	{!!Form::label('client_id','Client Name:') !!}
	{!!Form::select('client_id', [''=>'Please Select'] + $clients, null, array("class"=>"form-control", "id"=>"client") ) !!}
</div>


{!!Form::submit('Generate New Invoice', array('class'=>'btn btn-primary')) !!}

