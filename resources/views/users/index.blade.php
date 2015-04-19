@extends('template')


@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
			@endif
		</p>
        <div class="panel panel-white">

            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="example" >
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th class="hidden-xs">Contact Person</th>
                            <th class="hidden-xs">Email</th>
                            <th>Mobile Number</th>
                            <th>Level</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($users as $user)
                        <tr>
                            <td class="center">{{ $user->id }}</td>
                            <td>{{ $user->firstname.' '.$user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->level->level_name }}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('users/'.$user->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($user ,array('style'=>'margin: 0px;', 'action'=> array('UserController@destroy',$user->id))) !!}
                                    <button class = 'btn btn-danger btn-xs' type="submit"  >Delete</button>
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

@stop

@section('dataTablesjs')
	<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/media/blog/bootstrap_2/DT_bootstrap.js"></script>
@stop


