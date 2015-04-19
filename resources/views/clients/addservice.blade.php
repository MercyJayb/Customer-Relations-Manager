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

            {!! Form::model($client->service, array('url'=> 'addservice/'.$client->id, 'method'=> 'POST', 'role'=>'form')) !!}

            @include('clients._clientserviceform', ['btnText'=> "Add Service"])

            {!! Form::close() !!}
        </div>
    </div>
@stop
