<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iHotel</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:400,700&subset=cyrillic,cyrillic-ext,latin-ext');
        html {
            line-height: 1.25;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            font-size: 16px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
        }
        body {
            margin: 0;
            font-size: 14px;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
        }
        * {
            -webkit-box-sizing: border-box;
               -moz-box-sizing: border-box;
                    box-sizing: border-box;
        }
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
               -moz-box-sizing: border-box;
                    box-sizing: border-box;
        }
        article,
        aside,
        footer,
        header,
        nav,
        section {
            display: block;
        }
        h1,h2,h3,h4,h5,h6 {
            font-weight: 400;
            margin: 0 0 10px;
        }
        h1 {
            font-size: 24px;
        }
        h2 {
            font-size: 20px;
        }
        h3 {
            font-size: 28px;
        }
        h4 {
            font-size: 15px;
        }
        h5 {
            font-size: 14px;
        }
        h6 {
            font-size: 12px;
        }
        p {
            margin: 0 0 10px;
        }
        hr {
            box-sizing: content-box;
            height: 0;
            overflow: visible;
        }
        a {
            background-color: transparent;
            -webkit-text-decoration-skip: objects;
        }
        b,
        strong {
            font-weight: 700;
        }
        small {
            font-size: 80%;
        }
        img {
            border-style: none;
            display: inline-block;
            width: auto;
        }
        [hidden] {
            display: none;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 0 20px;
            max-width: 1400px;
        }
        .pull-left {
            text-align: left;
        }
        .pull-right {
            text-align: right;
        }
        .text-uppercase {
            text-transform: uppercase;
        }
        .text-center {
            text-align: center;
        }
        table {
            width: 100%;
        }
        .table {
            border-collapse: collapse;
            border-spacing: 0;
            empty-cells: hide;
        }
        .table tr,
        .table td {
            border: 1px solid #000;
        }
        .table .hidden,
        .table .hidden td {
            border: 0;
        }
        .table td {
            display: table-cell;
            padding: 10px 20px;
        }
        [colspan] {
            display: table-cell;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <tbody>
                <tr>
                    <td>
                        <div class="pull-left">
                            <img src="{{ asset('img/logo.png') }}" style="height: 60px;">
                        </div>
                    </td>
                    <td>
                        <div class="pull-right">
                            <img src="{{ asset('img/aspac_logo.png') }}" style="height: 80px;">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr class="hidden">
                    <td></td><td></td><td></td><td></td>
                    <td></td><td></td><td></td><td></td>
                </tr>
                <tr>
                    <td colspan="5">
                        <h4 class="text-uppercase">
                            <strong>
                                @if (App::isLocale('mn')) 
                                    {{ $order->hotel->name }}
                                @elseif (App::isLocale('en'))
                                    @if($order->hotel->name_en)
                                        {{ $order->hotel->name_en }}
                                    @else
                                        {{$order->hotel->name}}
                                    @endif
                                @endif
                            </strong>
                        </h4>
                        <p>
                            <strong>Address:</strong> {{ $order->hotel->address }}
                        </p>
                        <p>
                            <strong>Phone:</strong> {{ $order->hotel->phone_number }}
                        </p>
                    </td>
                    <td colspan="3">
                        <p>
                            <strong>Booking confirmation</strong>
                        </p>
                        <p>
                            <strong>Booking number:</strong> {{ $order->number }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="1">
                        <div class="text-center">
                            <h4 class="text-uppercase">Check-In</h4>
                            <h1>
                                <strong>{{ date('j', strtotime($order->startdate)) }}</strong>
                            </h1>
                            <p>
                                <strong>{{ date('F', strtotime($order->startdate)) }}</strong>
                            </p>
                            <p>from 14:00</p>
                        </div>
                    </td>
                    <td colspan="1">
                        <div class="text-center">
                            <h4 class="text-uppercase">Check-Out</h4>
                            <h1>
                                <strong>{{ date('j', strtotime($order->enddate)) }}</strong>
                            </h1>
                            <p>
                                <strong>{{ date('F', strtotime($order->enddate)) }}</strong>
                            </p>
                            <p>until 12:00</p>
                        </div>
                    </td>
                    <td colspan="1">
                        <div class="text-center">
                            <h4 class="text-uppercase">Rooms</h4>
                            <h1>
                                <strong>{{ $order->total_room_number }}</strong>
                            </h1>
                        </div>
                    </td>
                    <td colspan="1">
                        <div class="text-center">
                            <h4 class="text-uppercase">Nights</h4>
                            <h1>
                                <strong>{{ $order->day }}</strong>
                            </h1>
                        </div>
                    </td>
                    <td colspan="4">
                        <div class="text-center">
                            <h4 class="text-uppercase">Price</h4>
                            <h1>
                                @if ($order->price_dollar)
                                    <strong>US${{ number_format($order->price_dollar) }}</strong>
                                @else
                                    <strong>{{ number_format($order->price) }}₮</strong>
                                @endif
                            </h1>
                        </div>
                        <p>10% VAT is included.</p>
                        <p>5% Property service charge is included.</p>
                        <p>1% City tax is included.</p>
                        <p>
                            <strong>Prepayment:</strong> Payment will be withdrawn any time after booking.
                        </p>
                        <p>
                            <strong>Cancellation cost:</strong> No cancellation
                        </p>
                    </td>
                </tr>
                @if (unserialize($order->pickup))
                    <tr>
                        <td colspan="5">
                            <p>
                                <strong>Pickup Service:</strong> 
                                @if (App::isLocale('mn'))
                                    {{ unserialize($order->pickup)['name'] }}
                                @elseif (App::isLocale('en'))
                                    {{ unserialize($order->pickup)['name_en'] }}
                                @endif
                            </p>
                        </td>
                        <td colspan="3" rowspan="{{ count(unserialize($order->rooms)) + 1 }}">
                            <p>
                                <strong>Contact us</strong>
                            </p>
                            <p>
                                <strong>Phone:</strong> +976 99066350
                            </p>
                            <p>
                                <strong>Email:</strong> aspac@ihotel.mn
                            </p>
                        </td>
                    </tr>
                @endif
                @foreach (unserialize($order->rooms) as $key => $room)
                    <tr>
                        <td colspan="5">
                            <p>
                                <strong>Guest name:</strong> {{ $order->user->name }} {{ $order->user->surname }}
                            </p>
                            <p>
                                <strong>Room:</strong> {{ $room['room_name'] }}
                            </p>
                            <p>
                                <strong>Bed Sizes:</strong> {{ $room['room_category'] }}
                            </p>
                            <p>
                                <strong>Number:</strong> {{ $room['room_number'] }}
                            </p>
                        </td>
                        @if (!unserialize($order->pickup))
                            @if ($key == 0)
                                <td colspan="3" rowspan="{{ count(unserialize($order->rooms)) }}">
                                    <p>
                                        <strong>Contact us</strong>
                                    </p>
                                    <p>
                                        <strong>Phone:</strong> +976 99066350
                                    </p>
                                    <p>
                                        <strong>Email:</strong> aspac@ihotel.mn
                                    </p>
                                </td>
                            @endif
                        @endif
                    </tr>
                @endforeach
                @if ($order->request)
                    <tr>
                        <td colspan="8">
                            <p>
                                <strong>Special requests:</strong>
                            </p>
                            <p>{{ $order->request }}</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>