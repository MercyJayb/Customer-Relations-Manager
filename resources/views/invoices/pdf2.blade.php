<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" media="all" />
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="{{ URL::asset('assets/images/invoicelogo.png') }}"> <div style="font-family: cursive;font-size: 35px; text-align: right;">Invoice</span>
    </div>

    <div id="company" class="clearfix">
        <div>AFRICA BLUE WEBS,<br /> Luther Plaza</div>
        <div>P. O Box 26194 - 00100 Nairobi</div>
        <div>info@bluewebsafrica.co.ke</a></div>
    </div>
    <div id="project">
        <div><span>To:</span>{{ $bag->client->company }}</div>
        <div><span></span>{{ $bag->client->address }}</div>
        <div><span></span> {{ $bag->client->email }}</div>
        <br>
        <div><span>DATE</span>{{ Carbon\Carbon::parse($bag->created_at)->format('F d, Y') }}</div>
    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class="service">Salesperson</th>
            <th class="desc">Payment Terms</th>
            <th style="text-align: right;">Due Date</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td class="service">Tuva Adams Tuva</td>
                <td class="desc">Due upon receipt</td>
                <td class="total">{{ Carbon\Carbon::parse($bag->due_date)->format('F d, Y') }}</td>
            </tr>

        </tbody>
    </table>
    <br>
    <br>
    <table>
        <thead>
        <tr>
            <th class="service">Item</th>
            <th class="desc">Description</th>
            <th></th>
            <th></th>
            <th style="text-align: right;">Line Total</th>
        </tr>
        </thead>
        <tbody>
        <?php $costs = []; $a = 1; ?>
        @foreach($items as $k)
        <tr>
            <td class="service">{{ $a++ }}</td>
            <td class="desc">{{ $k->client_service->service->name }}</td>
            <td class="unit"></td>
            <td class="qty"></td>
            <td class="total">{{ $k->total }}</td>
        </tr>
        <?php $costs[] = $k->total; ?>

        @endforeach

        @for($i=1; $i<=5; $i++)
            <tr>
                <td class="service"></td>
                <td class="desc"></td>
                <td class="unit"></td>
                <td class="qty"></td>
                <td class="total"></td>
            </tr>
        @endfor

        <?php $subtotal = array_sum($costs) ?>

        <?php $tax = ($bag->tax > 0) ? $bag->tax : 0 ; ?>
        <?php $disc = ($bag->discount > 0) ? $bag->discount : 0 ; ?>

        <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">{{ $subtotal }}</td>
        </tr>

        @if ($bag->discount > 0)
        <tr>
            <td colspan="4">DISCOUNT</td>
            <td class="total">{{ $disc }}</td>
        </tr>
        @endif

        @if ($bag->tax > 0)
        <tr>
            <td colspan="4">TAX 16%</td>
            <td class="total">{{ $tax }}</td>
        </tr>
        @endif

        <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <?php $grand_total = $subtotal - $disc + $tax ?>
            <td class="grand total">Ksh. {{ number_format($grand_total, 2) }}</td>
        </tr>
        </tbody>
    </table>
    <div id="notices">
        <div class='notice' style="font-size: 14px;">Make all checks payable to Africa Blue Webs <br>
            Thank you for your business! <br>
        </div>
    </div>
</main>
<footer style="color: black;">
    Luther Plaza, 4th Fl. P.O. Box 26194 - 00100 Nairobi., Tel: +254 (20) 2345 229, +254 (735) 874816, +254 (787) 355336
</footer>
</body>
</html>