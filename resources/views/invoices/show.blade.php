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
                <div class="row">
                    <div class="col-md-12">
                        <div class="invoice">

                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4>Client:</h4>
                                    <div class="well">
                                        <address>
                                            <p><strong class="text-dark">{{ $data->client->fullnameAndCompany }}</strong>

                                            <p>{!! nl2br(e($data->client->address)) !!}

                                            <p><abbr title="Phone">P:</abbr> {{ $data->client->phone }}
                                        </address>
                                        <address>
                                            <strong class="text-dark">E-mail:</strong>
                                            <a href="mailto:#">
                                                {{ $data->client->email }}
                                            </a>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h4>We appreciate your business.</h4>
                                    <div class="padding-bottom-30 padding-top-10 text-dark">
                                        Thanks for being a customer.
                                        A detailed summary of your invoice is below.
                                        <br>
                                        If you have questions, we're happy to help.
                                        <br>
                                        Email info@bluewebsafrica.co.ke or contact us through other support channels.
                                    </div>
                                </div>
                                <div class="col-sm-4 pull-right">
                                    <h4>Payment Details:</h4>
                                    <ul class="list-unstyled invoice-details padding-bottom-30 padding-top-10 text-dark">

                                        <li>
                                            <strong>Account Name:</strong> Africa Blue Webs
                                        </li>

                                        <li>
                                            <strong>DATE:</strong> {{ Carbon\Carbon::parse($data->created_at)->format('D d M, Y') }}
                                        </li>
                                        <li>
                                            <strong>DUE:</strong> {{ Carbon\Carbon::parse($data->due_date)->format('D d M, Y') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Item </th>
                                            <th> Total </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $a = 1 ?>
                                        @foreach($invoice as $e)
                                            <tr>
                                                <td> {{ $a++ }} </td>
                                                <td> {{ $e->client_service_id }} </td>
                                                <td class="hidden-480"> {{ $e->total }} </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 invoice-block">
                                    <ul class="list-unstyled amounts text-small">
                                        <li>
                                            <strong>Sub-Total:</strong> {{ $subtotal }}
                                            <input type="hidden" id="subtotal" value="{{ $subtotal }}">
                                        </li>
                                        <li>
                                            <strong>Discount:</strong> <input type="text" size="6" id="discount">
                                        </li>
                                        <li>
                                            <span style="margin: 0px;padding: 0px;"> <strong>Include VAT (16%)</strong> <input type="checkbox" value="{{ 0.16 * $subtotal }}" id="vat"></span>
                                        </li>
                                        <li class="text-extra-large text-dark margin-top-15">
                                            <strong>Total:</strong> <span class="total"></span>
                                        </li>
                                    </ul>
                                    <br>
                                    {{--onclick="javascript:window.print();"--}}
                                    {{--<a  class="btn btn-lg btn-primary hidden-print">--}}
                                        {{--Print <i class="fa fa-print"></i>--}}
                                    {{--</a>--}}
                                    <a class="btn btn-lg btn-primary btn-o hidden-print">
                                        Save and Download PDF <i class="fa fa-check"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>


@stop

@section('formjs')
    <script>

        var discount = 0;
        var subtotal = $('#subtotal').val();
        var vat = 0;
        var total = subtotal;
        $('.total').html(total);


        function triggerChange(){
            $("#vat").trigger("change");
        }

        $("#vat").change(function() {
            var vat = $(this).val();
            var newtotal =  parseInt(vat) + parseInt(total);
            $('.total').html(newtotal);
        });

        // I have no idea what I am doing here
        $('#vat').click(function(e){
            if($("#vat").prop('checked')){ triggerChange(); }
        });

    </script>
@stop