<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Facebook Metadata /-->
    <meta property="og:url" content="https://www.ihotel.mn" />
    <meta property="og:title" content="iHotel.mn" />
    <meta property="og:image" content="{{ asset('img/share.jpg')}}" />
    <meta property="og:description" content="iHotel.mn: JCI ASPAC 2017's official partner, Onilne hotel reservation" />

    <!-- Google Metadata /-->
    <meta itemprop="name" content="iHotel.mn">
    <meta itemprop="description" content="iHotel.mn: JCI ASPAC 2017's official partner, Onilne hotel reservation"/>
    <meta itemprop="image" content="{{ asset('img/share.jpg')}}" />

    <!-- Twitter Metadata /-->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@ihotelmn" />
    <meta name="twitter:title" content="iHotel.mn">
    <meta name="twitter:description" content="iHotel.mn: JCI ASPAC 2017's official partner, Onilne hotel reservation"/>
    <meta name="twitter:image" content="{{ asset('img/share.jpg')}}" />

    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,100,100italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('dist/semantic.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jssocials.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jssocials-theme-flat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/map-icons.css') }}">
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('dist/semantic.min.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @include('partials.header')

    @yield('content')

    @if(!Request::is('aspac2017') && !Request::is('searchresult') && !Request::is('aspac'))
        @include('partials.footer')
    @endif
    
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('dist/components/popup.js') }}"></script>
    <script src="{{ asset('dist/components/dropdown.js') }}"></script>
    <script src="{{ asset('dist/components/transition.js') }}"></script>
    <script src="{{ asset('js/iframe-content.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/chosen.jquery.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/lodash.js') }}"></script>
    <script src="{{ asset('js/jssocials.min.js') }}"></script>
    <script src="{{ asset('js/numeral.min.js') }}"></script>
    <script src="{{ asset('js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery-scrolltofixed-min.js') }}"></script>
    @stack('script')
</body>
</html>