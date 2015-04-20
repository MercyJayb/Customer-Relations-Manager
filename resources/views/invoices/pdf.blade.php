<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <link rel='stylesheet' href='{{ URL::asset('assets/css/invoice/styles.css') }}' media='all' />
</head>
<body>
<header class='clearfix'>
    <div id='logo'>
        <img src='{{ URL::asset('assets/images/invoicelogo.png') }}'>
    </div>

    <div id='company' class='clearfix'>
        <div>Date: {{ Carbon\Carbon::parse($bag->created_at)->format('F d, Y') }}</div>
        <div>Invoice #: {{ $bag->invoice_id }}</div>

    </div>
    <div id='project'>
        <div>Africa Blue Webs</div>
        <div>'We Develop Your Dream'</div>
    </div>
    <div id='project'>
        <div>To: {{ $bag->client->company }}</div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp; {{ $bag->client->company }}</div>
    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class='service'>Salesperson</th>
            <th class='desc'>Payment Terms</th>
            <th>Due Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class='service'>Tuva Adams Tuva</td>
            <td class='desc'>Due upon Receipt</td>
            <td class='unit'>{{ Carbon\Carbon::parse($bag->due_date)->format('m/d/Y') }}</td>
        </tr>
        </tbody>
    </table>
    <br><br>
    <table>
        <thead>
        <tr>
            <th class='service'>Qty</th>
            <th class='desc'>Description</th>
            <th></th>
            <th>Unit Price</th>
            <th>Line Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
        <tr>
            <td class='service'>1</td>
            <td class='desc'>{{ $item->client_service_id }}</td>
            <td class='unit'></td>
            <td class='qty'>{{ $item->cost }}</td>
            <td class='total'>{{ $item->total }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan='4'>SUBTOTAL</td>
            <td class='total'>1000.00</td>
        </tr>
        <tr>
            <td colspan='4'>TAX 16%</td>
            <td class='total'>$1,300.00</td>
        </tr>
        <tr>
            <td colspan='4' class='grand total'>GRAND TOTAL</td>
            <td class='grand total'>6,500.00</td>
        </tr>
        </tbody>
    </table>
    <div id='notices'>
        <div>NOTICE:</div>
        <div class='notice'>Make all checks payable to Africa Blue Webs <br>
            Thank you for your business! <br>
        </div>
    </div>
</main>
<footer>
    Luther Plaza, 4th Fl. P.O. Box 26194 - 00100 Nairobi., Tel: +254 (20) 2345 229, +254 (735) 874816, +254 (787) 355336
</footer>
</body>
</html>