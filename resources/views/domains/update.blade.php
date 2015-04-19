@extends('template')

@section('content')

<div class="panel panel-white">

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

		{!! Form::model($domain, array('url'=> 'domains/'.$domain->id, 'method'=> $method, 'role'=>'form')) !!}

			@include('domains._form', ['btnText'=>'Update Domain'])
			
		{!! Form::close() !!}
	</div>
</div>
@stop


