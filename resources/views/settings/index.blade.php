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
			<th>Company Name</th>
			<th class="hidden-xs">Slogan</th>
			<th class="hidden-xs">Address</th>
			<th>Email</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($settings as $setting)
		<tr>
			<td class="center">{{ $setting->id }}</td>
			<td class="hidden-xs"><a href="{{ URL::to('settings/show/'.$setting->id) }}">{{ $setting->company }}</a></td>
			<td>{{ $setting->slogan }}</td>
			<td>{{ $setting->address }}</td>
			<td>{{ $setting->email }}</td>
			<td class="center">
				<div class="visible-md visible-lg hidden-sm hidden-xs">
					<a href="{{ URL::to('settings/'.$setting->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
					
				</div>
			</td>
			<td>
				{{ Form::open(array('method'=>'delete','action'=> array('SettingsController@destroy', $setting->id))) }}
				 	<button class = 'btn btn-danger btn-xs' type="submit">Delete</button>                      
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
		
	</tbody>
</table>

@stop

@section('deletescript')

<script type="text/javascript">

$('.delete').on("click", function (e) {
    e.preventDefault();

    var choice = confirm($(this).attr('data-confirm'));

    if (choice) {
        window.location.href = $(this).attr('href');
    }
});
</script>

@stop