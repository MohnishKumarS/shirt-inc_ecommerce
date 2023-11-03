<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>User details</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Shirt-Inc</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    
                    <span>Date: {{date('d-M-Y')}}</span> <br>
                    <span>Address: 58, Madukarai main road, Sundarapuram, Coimbatore,
                        Tamil Nadu, India</span> <br>
                        <span>Zip code : 641023</span> <br>
                </th>
            </tr>

    </table>

<div style="margin-top:20px ">
    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="6">
                    User Details
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Orders</th>
                <th>Created_at</th>
              
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
            @endphp
            @foreach ($user as $item)
            <tr>
                <td width="5%">{{$i++}}</td>
                <td width="10%"> {{$item->name}}</td>         
                <td width="10%"> {{$item->email}}</td>
                <td width="10%">{{$item->mobile}}</td>
                <td width="10%">{{count($item->orders)}}</td>
                <td width="15%" > {{$item->created_at->format('d-M-Y')}}</td>
            </tr>
            @endforeach
        
            {{-- <tr>
                <td colspan="5" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">Rs {{$order->total_price}}</td>
            </tr> --}}
        </tbody>
    </table>
</div>

    <br>
    <p class="text-center">
        Thank your for shopping with Shirt-Inc...
    </p>

</body>
</html>