@extends('template')

@section('content')

<div class="panel panel-white">
	<div class="panel-heading">
		<h5 class="panel-title">Create user</h5>
	</div>
	<div class="panel-body">
		<p class="text-small margin-bottom-20">
		
		@if($errors->has())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</p>

		{!! Form::model($user, array('url'=> 'users', 'method'=> $method, 'role'=>'form')) !!}

			@include('users._form')
			
		{!! Form::close() !!}
	</div>
</div>
@stop


