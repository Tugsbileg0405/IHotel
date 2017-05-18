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
            background-color: #fff;
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
            border-spacing: 0;
            border-collapse: collapse;
            empty-cells: hide;
        }
        .table .header td {
            padding-bottom: 40px;
            border-bottom: 1px solid #ddd;
        }
        .table .content td {
            padding-top: 40px; 
        }
        .table .content h1 {
            margin: 0 0 20px 0;
            font-size: 19px;
            font-weight: bold;
            color: #2f3133;
        }
        .table .content p {
            margin: 0 0 20px 0;
            font-size: 16px;
            line-height: 1.5em;
            color: #74787e;
        }
        .button {
            display: inline-block;
            padding: 10px;
            margin: 0 0 20px 0;
            min-width: 200px;
            border-radius: 3px;
            font-size: 15px;
            line-height: 25px;
            text-align: center;
            text-decoration: none;
            background-color: #3869D4;
            color: #fff;
        }
        .button.success {
            background-color: #22bc66;
        }
        .button.error {
            background-color: #dc4d2f;
        }
        .table tr,
        .table td {
            border: none;
        }
        [colspan] {
            display: table-cell;
        }
    </style>
</head>
<body>
    <div class="container">
        <table class="table">
            <tbody>
                <tr class="header">
                    <td class="text-center">
                        <img src="{{ asset('img/logo.png') }}" style="display:inline-block;height: 60px;">
                    </td>
                </tr>
                <tr class="content">
                    <td>
                        <h1>{{ $greeting }}</h1>
                        @foreach ($introLines as $line)
                            <p>{{ $line }}</p>
                        @endforeach
                        @if ($actionText)
                            <div class="text-center">
                                <a href="{{ $actionUrl }}" class="button {{ $level ? $level : '' }}">
                                    {{ $actionText }}
                                </a>
                            </div>
                        @endif
                        @foreach ($outroLines as $line)
                            <p>{{ $line }}</p>
                        @endforeach
                        <p>Regards, iHotel.mn</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>