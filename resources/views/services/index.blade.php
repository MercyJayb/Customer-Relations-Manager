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
                <table data-order='[[ 0, "desc" ]]' data-page-length='10' class="table table-striped table-bordered table-hover" id="example" >
                    <thead>
                        <tr>
                            <th style="width: 1px;">#</th>
                            <th class="hidden-xs">Service Name</th>
                            <th style="width: 1px;"></th>
                            <th style="width: 1px;"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($services as $service)
                        <tr>
                            <td class="center">{{ $service->id }}</td>
                            <td class="hidden-xs"><a href="{{URL::to('services/'.$service->id)}}">{{ $service->name }}</a></td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('services/'.$service->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($service ,array('style'=>'margin: 0px;', 'action'=> array('ServiceController@destroy',$service->id))) !!}
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


