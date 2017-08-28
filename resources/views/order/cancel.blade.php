<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-weight: 400;
                margin: 0 0 10px;
            }

            h1 {
                font-size: 28px;
            }

            h2 {
                font-size: 24px;
            }

            h3 {
                font-size: 20px;
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

            .header {
                background-color: #0063a1;
                color: #fff;
                padding: 5px 0;
            }

            .container {
                width: 100%;
                margin: 0 auto;
                padding: 0 20px;
                max-width: 800px;
            }

            .pull-left {
                float: left;
            }

            .pull-right {
                float: right;
            }

            .text-uppercase {
                text-transform: uppercase;
            }

            .text-center {
                text-align: center;
            }

            .row:before,
            .row:after {
                display: table;
                content: " ";
            }

            .row:after {
                clear: both;
            }

            .col-xs-2 {
                float: left;
                width: 15%;
            }

            .col-xs-6 {
                float: left;
                width: 50%;
            }

            .col-xs-10 {
                float: left;
                width: 85%;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <div class="container">
                <a class="brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" style="height: 50px">
                </a>
                <span class="pull-right" style="line-height: 50px">Confirmation number: <b>{{ $order->number }}</b></span>
            </div>
        </div>
        <div class="container">
            <h2 style="margin: 30px 0"><b>Your booking has been successfully cancelled</b></h2>
            <p style="margin: 30px 0 0">Dear {{ json_decode($order->userdata)['name'] }}</p>
            <p>We can confirm that your reservation at Hotel Name has been cancelled. You don't need to take further action, but if you have any queries for the property, contact details are: +976 99066350</p>
            <div class="row">
                <div class="col-xs-6">
                    <h2 style="margin: 30px 0 0; color: #0063a1">{{ $order->hotel_name }}</h2>
                    <p>Ulaanbaatar, Mongolia</p>
                    <p style="margin: 20px 0 0">Phone: {{ $order->hotel->phone_number }}</p>
                </div>
                <div class="col-xs-6">
                    <h3 class="text-uppercase pull-right" style="margin: 50px 0 0; color: red">Cancelled</h3>
                </div>
            </div>
            <div style="margin: 40px 0 0; padding: 15px 0; border-bottom: 2px solid #eee">Check-in <span class="pull-right">{{ date('F j, Y', strtotime($order->startdate)) }}</span></div>
            <div style="padding: 15px 0; border-bottom: 2px solid #eee">Check-out <span class="pull-right">{{ date('F j, Y', strtotime($order->enddate)) }}</span></div>

            <div class="row" style="margin: 30px 0 0">
                <div class="col-xs-2">
                    <div class="text-center">
                        <i class="material-icons" style="color: #0063a1">error</i>
                    </div>
                </div>
                <div class="col-xs-10">
                    <p style="line-height: 24px;">Please be aware that cancellation cost may apply according to the cancellation policy</p>
                </div>
            </div>
        </div>
    </body>
</html>