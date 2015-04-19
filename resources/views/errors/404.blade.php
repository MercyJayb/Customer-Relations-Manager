@extends('template')

@section('content')
<p class="text-small margin-bottom-20">
	<h4>Oops, something went wrong.</h4>
	<h6>Click <a href="{{ URL::to('/') }}">here</a> to go back to the Dashboard</h6>
</p>
	
@stop