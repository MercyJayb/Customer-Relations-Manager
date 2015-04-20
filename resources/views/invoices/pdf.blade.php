<html>
<head>
    <title>HTML Invoice Template</title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <style type='text/css'>
        <!--
        body {
            font-family:Tahoma;
        }

        img {
            border:0;
        }

        #page {
            width:800px;
            margin:0 auto;
            padding:15px;

        }

        #logo {
            float:left;
            margin:0;
        }

        #address {
            height:181px;
            margin-left:250px;
        }

        table {
            widows: 500px;
        }

        td {
            padding:5px;
        }

        tr.odd {
            background:#e1ffe1;
        }
        -->
    </style>
</head>
<body>
<div id='page'>

    <div id='address'>
        <div id='logo'>
            <img src=$logo >
        </div><!--end logo-->
        <div style=''>
            Africa Blue Webs <p style='float: right'>Date: $date <p><br/>
                'We Develop Your Dream' <p style='float: right'>Invoice #: [$invoice_id]<p><br/><br />

        </div>
    </div><!--end address-->

    <div id='content'>
        <p>
            <strong>To:</strong><br />
            {$bag->client->company} <br />


        <table style='width: 660px;'>
            <thead>
            <tr style='background-color:red'>

                <th>Salesperson</th>
                <th>Payment</th>
                <th>Due date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Tuva Adams Tuva</td>
                <td>Due upon receipt</td>
                <td> $bag->due_date </td>

            </tr>
            </tbody>
        </table>
        <br><br><br>

        <hr>
        <table style='width: 500px;'>
            <thead>
            <tr>
                <td><strong>#</strong></td>
                <td><strong>Service</strong></td>
                <td><strong>Cost</strong></td>
                <td><strong>Amount</strong></td>
            </tr>
            </thead>
            <tbody>
            <tr class='odd'>
                <td>Product 1</td>
                <td>1</td>
                <td>4.95</td>
                <td>4.95</td>
            </tr>


            <tbody>
        </table>
        <hr>


        <hr>
        <p>
        <center><small>
                Make all checks payable to Africa Blue Webs <br>
                Thank you for your business! <br>
                Luther Plaza, 4th Fl. P.O. Box 26194 - 00100 Nairobi., Tel: +254 (20) 2345 229, +254 (735) 874816, +254 (787) 355336
            </small></center>
        </p>
    </div><!--end content-->
</div><!--end page-->
</body>
</html>