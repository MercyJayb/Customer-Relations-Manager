@extends('template')


@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
			@endif
		</p>
	

<table class="table table-hover" id="sample-table-1">
	<thead>
		<tr>
			<th class="center">#</th>
			<th>Full Name</th>
			<th class="hidden-xs">Email</th>
			<th class="hidden-xs">Phone Number</th>
			<th>Level</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td class="center">{{ $user->id }}</td>
			<td class="hidden-xs"><a href="{{ URL::to('users/'.$user->id) }}">{{ $user->firstname.' '.$user->lastname }}</a></td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->phone }}</td>
			<td>
				<span class="label @if($user->level_id == 1) {{'label-success'}} @elseif($user->level_id == 2) {{'label-info'}} @else {{'label-warning'}} @endif }}">
					{{ $user->level->level_name }}
				</span>
			</td>
			<td class="center">
				<div class="visible-md visible-lg hidden-sm hidden-xs">
					<a href="{{ URL::to('users/'.$user->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
					
				</div>
			</td>
			<td>

				{{ Form::open(array('method'=>'delete','action'=> array('UserController@destroy',$user->id))) }}
				 	<button class = 'btn btn-danger btn-xs' type="submit">Delete</button>                      
				{{Form::close()}}   

				
			</td>
		</tr>
		@endforeach
		
	</tbody>
</table>


<span class="pull-right">{{ $users->links() }}</span>

@stop
