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
        <img src="{{ URL::asset('assets/images/invoicelogo.png') }}">
    </div>

    <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>Africa Blue Webs,<br /> Luther Plaza</div>
        <div>P. O Box 26194 - 00100 Nairobi</div>
        <div>info@bluewebsafrica.co.ke</a></div>
    </div>
    <div id="project">
        <div><span>COMPANY</span>{{ $bag->client->company }}</div>
        <div><span>ADDRESS</span>{{ $bag->client->address }}</div>
        <div><span>EMAIL</span> {{ $bag->client->email }}</div>
        <div><span>DATE</span>{{ Carbon\Carbon::parse($bag->created_at)->format('F d, Y') }}</div>
        <div><span>DUE DATE</span> {{ Carbon\Carbon::parse($bag->due_date)->format('F d, Y') }}</div>
    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class="service">QUANTITY</th>
            <th class="desc">SERVICE</th>
            <th></th>
            <th>UNIT COST</th>
            <th>TOTAL</th>
        </tr>
        </thead>
        <tbody>
        <?php $costs = []; ?>
        @foreach($items as $k)
        <tr>
            <td class="service">1</td>
            <td class="desc">{{ $k->client_service->service->name }}</td>
            <td class="unit"></td>
            <td class="qty">{{ $k->total }}</td>
            <td class="total">{{ $k->total }}</td>
        </tr>
        <?php $costs[] = $k->total; ?>

        @endforeach

        <?php $subtotal = number_format(array_sum($costs), 2) ?>

        <?php $tax = ($bag->tax != NULL) ? $bag->tax : 0 ; ?>
        <?php $disc = ($bag->discount != NULL) ? $bag->discount : 0 ; ?>

        <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">{{ $subtotal }}</td>
        </tr>

        @if ($bag->discount != NULL)
        <tr>
            <td colspan="4">DISCOUNT</td>
            <td class="total">{{ $disc }}</td>
        </tr>
        @endif

        @if ($bag->tax != NULL)
        <tr>
            <td colspan="4">TAX 16%</td>
            <td class="total">{{ $tax }}</td>
        </tr>
        @endif

        <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <?php $grand_total = $subtotal - $disc ?>
            <?php $grand_total = $grand_total + $tax ?>
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
<footer>
    Luther Plaza, 4th Fl. P.O. Box 26194 - 00100 Nairobi., Tel: +254 (20) 2345 229, +254 (735) 874816, +254 (787) 355336
</footer>
</body>
</html>