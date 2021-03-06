<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Facebook Metadata /-->
    <meta property="og:url" content="https://www.ihotel.mn" />
    <meta property="og:title" content="iHotel.mn: Online hotel booking" />
    <meta property="og:image" content="{{ asset('img/share.jpg')}}" />
    <meta property="og:description" content="Олон улсын зочид буудлын захиалга" />

    <!-- Google Metadata /-->
    <meta itemprop="name" content="iHotel.mn: Online hotel booking">
    <meta itemprop="description" content="Олон улсын зочид буудлын захиалга"/>
    <meta itemprop="image" content="{{ asset('img/share.jpg')}}" />

    <!-- Twitter Metadata /-->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@ihotelmn" />
    <meta name="twitter:title" content="iHotel.mn: Online hotel booking">
    <meta name="twitter:description" content="Олон улсын зочид буудлын захиалга"/>
    <meta name="twitter:image" content="{{ asset('img/share.jpg')}}" />

    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,100,100italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('dist/semantic.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('dist/semantic.min.js') }}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'#editor' });</script>
    <title>@yield('title')</title>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @include('partials.header')

    <div class="main-breadcrumb">
        <div class="ui container">
            <div class="ui stackable column grid">
                <div class="six wide column">
                    <h3 class="ui header">{{ __('messages.User section') }}</h3>
                </div>
                <div class="right aligned ten wide column">
                    <div class="ui breadcrumb">
                        <a class="section">{{ __('messages.Home') }}</a>
                        <span class="divider">/</span>
                        <div class="active section">{{ __('messages.User section') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-page">
        <div class="ui container">
            <div class="ui stackable column grid">
                <div class="five wide column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="right floated meta">
                                <h4 class="ui sub header"></h4>
                            </div>
                            <img class="ui avatar image" src="{{ asset(Auth::user()->avatar) }}">
                            {{ Auth::user()->email }}
                        </div>
                        <div class="ui fluid vertical menu">
                            <a href="{{ url('profile/edit') }}" class="item{{ Request::is('profile/edit') ? ' active' : '' }}">
                                <i class="user icon"></i> {{ __('messages.Edit profile') }}
                            </a>
                            <a href="{{ url('profile/edit/password') }}" class="item{{ Request::is('profile/edit/password') ? ' active' : '' }}">
                                <i class="key icon"></i> {{ __('messages.Change password') }}
                            </a>
                        </div>
                    </div>
                    <a class="ui green button" href="{{ url('profile/posts/create') }}">
                        <i class="plus icon"></i> {{ __('messages.Add post') }}
                    </a>
                    <div class="ui fluid vertical menu">
                        <a class="item{{ Request::is('profile') ? ' blue active' : '' }}" href="{{ url('profile') }}">
                            {{ __('messages.My posts') }}
                            <div class="ui label{{ Request::is('profile') ? ' blue left pointing' : '' }}">{{ $postCount }}</div>
                        </a>
                        <a class="item{{ Request::is('profile/orders') ? ' blue active' : '' }}" href="{{ url('profile/orders') }}">
                            {{ __('messages.My orders') }}
                            <div class="ui label{{ Request::is('profile/orders') ? ' blue left pointing' : '' }}">{{ $orderCount }}</div>
                        </a>
                        <a class="item{{ Request::is('profile/rate') ? ' blue active' : '' }}" href="{{ url('profile/rate') }}">
                            {{ __('messages.Give a rating') }}
                            <div class="ui label{{ Request::is('profile/rate') ? ' blue left pointing' : '' }}">{{ $rateCount }}</div>
                        </a>
                        @if (Auth::user()->isHotelAdmin())
                            <a class="item{{ Request::is('profile/hotels') ? ' blue active' : '' }}" href="{{ url('profile/hotels') }}">
                                 {{ __('messages.My hotels') }}
                                <div class="ui label{{ Request::is('profile/hotels') ? ' blue left pointing' : '' }}">{{ Auth::user()->hotels()->count() }}</div>
                            </a>
                        @endif
                    </div>
                    @if (Auth::user()->isAdmin())
                        <div class="ui fluid vertical menu">
                            <a class="item" href="{{ url('profile/order') }}">
                                Захиалга
                            </a>
                            <a class="item" href="{{ url('profile/dollarrate') }}">
                                Долларын ханш
                            </a>
                            <a class="item" href="{{ url('profile/hotelcategory') }}">
                                Буудлын ангилал
                            </a>
                            <a class="item" href="{{ url('profile/hotelservicecategory') }}">
                                Буудлын үйлчилгээ
                            </a>
                            <a class="item" href="{{ url('profile/roomcategory') }}">
                                Өрөөний ангилал
                            </a>
                            <a class="item" href="{{ url('profile/roomservicecategory') }}">
                                Өрөөний үйлчилгээ
                            </a>
                            <a class="item" href="{{ url('profile/pickup') }}">
                                Онгоцны буудлаас тосох
                            </a>
                            <a class="item" href="{{ url('profile/hotel') }}">
                                Буудал
                            </a>
                            <a class="item" href="{{ url('profile/post') }}">
                                Нийтлэл
                            </a>
                            <a class="item" href="{{ url('profile/postcategory') }}">
                                Нийтлэлийн ангилал
                            </a>
                            <a class="item" href="{{ url('profile/postcomment') }}">
                                Нийтлэлийн сэтгэгдэл
                            </a>
                            <a class="item" href="{{ url('profile/question') }}"> 
                                Түгээмэл асуулт
                            </a>
                            <a class="item" href="{{ url('profile/information') }}">
                                Нүүр хуудасны слайд
                            </a>
                            <a class="item" href="{{ url('profile/slide') }}">
                                Нүүр хуудасны зураг
                            </a>
                            <a class="item" href="{{ url('profile/comment') }}">
                                Сэтгэгдэл
                            </a>
                            <a class="item" href="{{ url('profile/term') }}">
                                Үйлчилгээний нөхцөл
                            </a>
                            <a class="item" href="{{ url('profile/team') }}">
                                Хамт олон
                            </a>
                            <a class="item" href="{{ url('profile/user') }}">
                                Хэрэглэгч
                            </a>
                            <a class="item" href="{{ url('profile/option') }}">
                                Тохиргоо
                            </a>
                        </div>
                    @endif
                </div>
                @yield('content')
            </div>
        </div>
    </div>

    @include('partials.footer')
    
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('dist/components/popup.js') }}"></script>
    <script src="{{ asset('dist/components/dropdown.js') }}"></script>
    <script src="{{ asset('dist/components/transition.js') }}"></script>
    <script src="{{ asset('js/iframe-content.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('script')
</body>
</html>