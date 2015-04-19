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
                            <th class="hidden-xs">Tender Title</th>
                            <th class="hidden-xs">Client</th>
                            <th class="hidden-xs">Start Date</th>
                            <th style="width: 133px;"></th>
                            <th style="width: 1px;"></th>
                            <th style="width: 1px;"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($tenders as $tender)
                        <tr>
                            <td class="center">{{ $tender->id }}</td>
                            <td><a href="{{ URL::to('tenders/'.$tender->id) }}">{{ $tender->title }}</a></td>
                            <td class="hidden-xs">{{ $tender->client->fullnameAndCompany }}</td>
                            <td>{{ $tender->start_date->format('h:ia D d M, Y') }} </td>
                            <td>
                                    @if($tender->status == TRUE)
                                        <span class="label label-success">COMPLETED</span>
                                    @else
                                        <span class="label label-warning">PENDING</span>
                                    @endif
                                    <a href="{{ URL::to('tenders-update-status/'.$tender->id)  }}"><i class="ti-reload"></i></a>
                            </td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{ URL::to('tenders/'.$tender->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
                                </div>
                            </td>
                            <td>
                                {!! Form::model($tender ,array('style'=>'margin: 0px;', 'action'=> array('TenderController@destroy',$tender->id))) !!}
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


